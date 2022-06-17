<?php

namespace Lavdiu\DemoApp;

use Laf\Database\Db;
use Laf\UI\Grid\PhpGrid\ActionButton;
use Laf\UI\Grid\PhpGrid\Column;
use Laf\UI\Grid\PhpGrid\PhpGrid;
use Laf\Util\Settings;
use Laf\Util\UrlParser;

/**
 * Class Person
 * @package asm
 * Main Class for Table person
 * This class inherits functionality from BasePerson.
 * It is generated only once, please include all logic and code here
 */
class Person extends Base\BasePerson
{

    public static $loggedInstance = null;

    /**
     * Instructors constructor.
     * @param int $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->translateFields();

    }

    public function translateFields()
    {
    }

    /**
     * Returns the lowest level class in the inheritance tree
     * Used with late static binding to get the lowest level class
     */
    protected function returnLeafClass()
    {
        return $this;
    }

    /**
     * Find one row by using the first result
     * @param array $keyValuePairs
     * @return Person
     * @throws \Exception
     */
    public static function findOne(array $keyValuePairs): ?Person
    {
        return parent::bOfindOne($keyValuePairs);
    }

    /**
     * @param array $keyValuePairs
     * @return Person[]
     * @throws \Exception
     */
    public static function find(array $keyValuePairs = []): array
    {
        return parent::bOfind($keyValuePairs);
    }


    /**
     * @param $name
     * @param $uername
     * @param $password
     * @return bool
     * @throws \Exception
     */
    public function register($name, $username, $password)
    {
        $this->setNameVal($name)
            ->setUsernameVal($username)
            ->setRecordStatusIdVal(RecordStatus::PENDING)
            ->setActivationCodeVal($this->getNewCode())
            ->setPasswordVal(
                $this->encryptPassword($password)
            );
        $res = $this->insert();
        if ($res) {
            $this->requestUserActivation();
        }
        return $res;
    }

    /**
     * @param $password
     * @return string
     */
    public function encryptPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function getNewCode()
    {
        return bin2hex(random_bytes(80));
    }

    /**
     * @return bool
     * @throws InvalidForeignKeyValue
     * @throws \PHPMailer\PHPMailer\Exception
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function requestUserActivation()
    {
        $settings = Settings::getInstance();
        $twig = Factory::getNewTwigInstance();
        $emailBody = $twig->render('welcome_email_enduser.twig',
            [
                'user_name' => $this->getNameVal(),
                'confirmation_url' => $settings->getProperty('login_url') . '?activate=' . $this->getActivationCodeVal(),
            ]
        );

        $email = new Email();
        $email
            ->setEmailToVal($this->getEmailVal())
            ->setSubjectVal('Activate your account with ' . $settings->getProperty('homepage'))
            ->setFieldValueHTML('body', $emailBody);
        $ok = $email->insert();
        if ($ok) {
            $email->send();
        }
        return $ok;
    }


    /**
     * @param $activationCode
     * @return bool
     * @throws \Exception
     */
    public function activateUser($activationCode)
    {
        if (mb_strlen($activationCode) < 10)
            return false;
        $person = $this->findOne([
                'activation_code' => $activationCode,
                'record_status_id' => RecordStatus::PENDING
            ]
        );
        if ($person->getRecordStatusIdVal() == RecordStatus::PENDING) {
            $person->setActivationCodeVal(null)
                ->setRecordStatusIdVal(1)
                ->update();
            return true;
        }
        return false;
    }


    /**
     * @param $username
     * @param $password
     * @return Person
     * @throws \Exception
     */
    public static function login($username, $password): ?Person
    {
        if (mb_strlen($username) <= 3) {
            throw new \Exception('Emri i shfrytezuesit duhet te kete 5 ose me shume shkronja');
        }

        $person = self::findOne([
            'username' => $username,
            'record_status_id' => RecordStatus::ACTIVE
        ]);

        if ($person && $person->recordExists()) {
            if (password_verify($password, $person->getPasswordVal())) {
                $person->checkLoginTimeRestrictions();

                $person->storeSessionInformation();
                $person->storeLoginLog();
                return $person;
            } else {
                throw new LoginErrorException('Emri i shfrytëzuesit ose fjalëkalimi janë gabim');
            }
        } else {
            throw new LoginErrorException('Shfrytëzuesi i dhënë nuk ekziston');
        }
    }

    /**
     * @throws LoginErrorException
     */
    private function checkLoginTimeRestrictions(): void
    {
        if (
            $this->getTimeRestrictedLoginStartTimeVal() == ''
            || $this->getTimeRestrictedLoginStartTimeVal() == '00:00:00'
            || $this->getTimeRestrictedLoginEndTimeVal() == ''
            || $this->getTimeRestrictedLoginEndTimeVal() == '00:00:00'
        ) {
            return;
        }

        $now = new \DateTime();
        $dtStart = \DateTime::createFromFormat("Y-m-d H:i:s", date('Y-m-d ') . $this->getTimeRestrictedLoginStartTimeVal());
        $dtEnd = \DateTime::createFromFormat("Y-m-d H:i:s", date('Y-m-d ') . $this->getTimeRestrictedLoginEndTimeVal());

        if ($now < $dtStart || $now > $dtEnd) {
            throw new LoginErrorException(
                sprintf('Hyrja ne ASM eshte e kufizuar. <br />Mund te caseni vetem ne mes ores %s dhe %s '
                    , $this->getTimeRestrictedLoginStartTimeVal()
                    , $this->getTimeRestrictedLoginEndTimeVal()
                )
            );
        }

    }

    /**
     * @param $keycode
     * @return bool|mixed
     * @throws \Exception
     */
    public function pass_reset_authentication($keycode)
    {

        $person = $this->findOne([
            'reset_password_code' => $keycode
        ]);

        if ($person->recordExists()) {
            return $person->getIdVal();
        } else {
            return false;
        }
    }


    /**
     * Stores the login log
     */
    private function storeLoginLog()
    {
        $l = new PersonLoginLog();
        $l->setPersonIdVal($this->getIdVal());
        $l->setIpAddressVal($_SERVER['REMOTE_ADDR']);
        #$l->setUserAgentVal($_SERVER['HTTP_USER_AGENT']);
        $pd = PersonLoginDevice::getDeviceByCookie(SessionHelper::getCookieDeviceId());
        if (is_numeric($pd->getIdVal())) {
            $l->setDeviceIdVal($pd->getIdVal());
        }
        $l->store();
    }

    /**
     * @param $username
     * @return bool
     * @throws InvalidForeignKeyValue
     * @throws \PHPMailer\PHPMailer\Exception
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function requestPasswordReset($username)
    {
        if (mb_strlen($username) < 5)
            return false;

        $person = $this->findOne(['username' => $username]);
        if ($person->getUsernameVal() == $username) {

            $person
                ->setResetPasswordCodeVal($this->getNewCode())
                ->setResetPasswordTimeVal(date('Y-m-d H:i:s'))
                ->store();

            $settings = Settings::getInstance();
            $twig = Factory::getNewTwigInstance();
            $emailBody = $twig->render('reset_password_email.twig',
                [
                    'reset_url' => $settings->getProperty('reset_password') . '?keycode=' . $person->getResetPasswordCodeVal(),
                    'user_name' => $person->getNameVal()
                ]
            );

            $email = new Email();
            $email
                ->setEmailToVal($person->getEmailVal())
                ->setSubjectVal('Reset your password for Intrepicure.com')
                ->setFieldValueHTML('body', $emailBody);
            $ok = $email->insert();
            if ($ok) {
                $email->send();
            }
            return $ok;
        }
        return false;
    }

    /**
     * @param $username
     * @param $resetPasswordCode
     * @param $newPassword
     * @return bool
     * @throws \Exception
     */
    public function resetPassword($username, $resetPasswordCode, $newPassword)
    {
        if (mb_strlen($resetPasswordCode) < 50 || mb_strlen($username) < 5 || mb_strlen($newPassword) < 4)
            return false;

        $person = $this->findOne([
            'username' => $username,
            'reset_password_code' => $resetPasswordCode
        ]);

        if ($person->getUsernameVal() == $username) {
            $person
                ->setPasswordVal($this->encryptPassword($newPassword))
                ->setLastActivityVal(date('Y-m-d H:i:s'))
                ->setResetPasswordCodeVal(null)
                ->setResetPasswordTimeVal(null)
                ->update();
        }
        return false;
    }

    /**
     * @param int $duration Duration in minutes
     * @throws \Exception
     */
    private function storeSessionInformation($duration = 60)
    {
        $this
            ->setLoginCookieVal($this->getNewCode())
            ->setLoginTimeVal(date('Y-m-d H:i:s'))
            ->setLoginAgentVal($_SERVER['HTTP_USER_AGENT'])
            ->setLoginIpVal($_SERVER['REMOTE_ADDR'])
            ->setLoginDurationMinutesVal($duration)
            ->setLastActivityVal(date('Y-m-d H:i:s'))
            ->update();

        $_SESSION['person'] = [
            'id' => $this->getIdVal(),
            'login_cookie' => $this->getLoginCookieVal(),
            'username' => $this->getUsernameVal(),
            'email' => $this->getEmailVal(),
            'name' => $this->getNameVal()
        ];
    }

    public static function getActiveUserByApiKey(string $api_key)
    {
        if (strlen($api_key) < 10) {
            return new self;
        }
        $usr = self::findOne([
            'record_status_id' => RecordStatus::ACTIVE,
            'api_key' => $api_key
        ]);
        return $usr;
    }

    /**
     * Get logged user
     * @return Person
     */
    public static function getLoggedUserInstance()
    {
        if (!is_object(self::$loggedInstance) || !is_numeric(self::$loggedInstance->getIdVal())) {
            if (isset($_SESSION['person']) && isset($_SESSION['person']['id']) && is_numeric($_SESSION['person']['id'])) {
                self::$loggedInstance = new self($_SESSION['person']['id']);
            } else if (isset($_GET['api_key'])) {
                $person = self::getActiveUserByApiKey($_GET['api_key']);
                $person->setSessionData();
                self::$loggedInstance = $person;
            } else {
                self::$loggedInstance = new self();
            }

        }
        return self::$loggedInstance;
    }

    /**
     * Get logged user id
     * @return int
     */
    public static function getLoggedUserId()
    {
        $person = self::getLoggedUserInstance();
        return $person->getIdVal();
    }

    /**
     * @param $username
     * @return bool
     * @throws \Exception
     */
    public function accountExists($username)
    {
        $person = $this->findOne(['username' => $username]);
        return $person->getUsernameVal() == $username;
    }

    /**
     * Check if the user is logged in
     * @return bool
     */
    public static function isLoggedIn()
    {
        $user = self::getLoggedUserInstance();
        return $user->recordExists() && $user->getRecordStatusIdVal() == RecordStatus::ACTIVE;
    }


    /**
     * @param string $oldPassword
     * @param string $newPassword
     * @return bool
     * @throws \Laf\Exception\InvalidForeignKeyValue
     */
    public function changePassword(string $oldPassword, string $newPassword): bool
    {
        if (mb_strlen($newPassword) < 6) {
            return false;
        }
        if (password_verify($oldPassword, $this->getPasswordVal())) {
            $this->setPasswordVal(
                $this->encryptPassword($newPassword)
            );
            $this->store();
            return true;
        }
        return false;
    }

    public function getModuletArray(): array
    {
        return explode(',', $this->getModuletVal());
    }

    public function setSessionData(): void
    {


        $_SESSION['person']['id'] = $this->getIdVal();
        $_SESSION['mod_comma'] = $this->getModuletVal();
        $_SESSION['mod_array'] = explode(',', $this->getModuletVal());

    }

    /**
     * @return PhpGrid
     */
    public function getUserGroupsGrid(): PhpGrid
    {
        if (!is_numeric(UrlParser::getId())) {
            return new PhpGrid('unknown');
        }

        $grid = new PhpGrid('person_user_group');
        $grid->setAllowExport(false);
        $grid->setTitle('Groups')
            ->setRowsPerPage(20)
            ->setSqlQuery(sprintf('
SELECT * FROM (
	SELECT
g.id 
, g.label
, g.description
, rs.label as status
FROM `group` g
JOIN person_group pg On g.id = pg.group_id
LEFT JOIN record_status rs ON coalesce(g.record_status_id, 1) = rs.id
WHERE pg.person_id = %s
)l1 
', UrlParser::getId()));

        $grid->addColumn(new Column('id', 'Id', true));
        $grid->addColumn(new Column('label', 'Group', true));
        $grid->addColumn(new Column('description', 'Description', true));
        $grid->addColumn(new Column('status', 'Status', true));
        $deleteLink = new ActionButton('Delete', sprintf('?module=%s&action=deleteGroup&id={id}', UrlParser::getModule()), 'fa fa-trash');
        $deleteLink->addAttribute('onclick', "return confirm('Sigurte?')");
        $grid->addActionButton($deleteLink);
        $grid->setSortDetails('id', 'ASC');
        $grid->setShowTitle(false)
            ->setShowSearchBar(false)
            ->setRowsPerPage(10);
        return $grid;
    }

    /**
     * @return PhpGrid
     */
    public function getUserRoleGrid(): PhpGrid
    {
        if (!is_numeric(UrlParser::getId())) {
            return new PhpGrid('unknown');
        }

        $grid = new PhpGrid('person_user_role');
        $grid->setAllowExport(false);
        $grid->setTitle('Groups')
            ->setRowsPerPage(20)
            ->setSqlQuery(sprintf('
SELECT * FROM (
    SELECT
        g.id as group_id
        , r.id as role_id
        , g.label as group_label
        , r.label as role_label
        , grs.label as group_status
        , rrs.label as role_status
    FROM `group` g
    JOIN person_group pg On g.id = pg.group_id
    JOIN group_role gr ON g.id = gr.group_id
    JOIN `role` r ON gr.role_id = r.id
    LEFT JOIN record_status grs ON coalesce(g.record_status_id, 1) = grs.id
    LEFT JOIN record_status rrs ON coalesce(r.record_status_id, 1) = rrs.id
    WHERE pg.person_id = %s
)l1 
', UrlParser::getId()));

        $grid->addColumn(new Column('group_id', 'Group Id', true));
        $grid->addColumn(new Column('role_id', 'Role ID', true));
        $grid->addColumn(new Column('role_label', 'Role', true));
        $grid->addColumn(new Column('group_label', 'Group', true));
        $grid->addColumn(new Column('group_status', 'Group Status', true));
        $grid->addColumn(new Column('role_status', 'Role Status', true));
        $grid->setSortDetails('role_label', 'ASC')
            ->setShowTitle(false)
            ->setShowSearchBar(false)
            ->setRowsPerPage(10);
        return $grid;
    }

    /**
     * @return PhpGrid
     */
    public function getUserLoginLogGrid(): PhpGrid
    {
        if (!is_numeric(UrlParser::getId())) {
            return new PhpGrid('unknown');
        }

        $grid = new PhpGrid('person_login_log');
        $grid->setAllowExport(false);
        $grid->setTitle('Login Log')
            ->setRowsPerPage(20)
            ->setSqlQuery(sprintf('
SELECT * FROM (
    SELECT
           l.id
        , l.created_on
        , l.ip_address
        , pld.device_name
        , COALESCE(pld.user_agent, l.user_agent) AS user_agent
    FROM person_login_log l
    LEFT JOIN person_login_device pld on l.device_id = pld.id
    WHERE l.person_id = %s
)l1 
', UrlParser::getId()));

        $grid->addColumn(new Column('id', 'Id', false));
        $grid->addColumn(new Column('device_name', 'Device', true));
        $grid->addColumn(new Column('created_on', 'Date', true));
        $grid->addColumn(new Column('ip_address', 'IP Address', true));
        $grid->addColumn(new Column('user_agent', 'Browser', true));
        $grid->setSortDetails('id', 'DESC')
            ->setShowTitle(false)
            ->setShowSearchBar(false)
            ->setRowsPerPage(10);
        return $grid;
    }

    /**
     * @return PhpGrid
     */
    public function getUserActivityGrid(): PhpGrid
    {
        if (!is_numeric(UrlParser::getId())) {
            return new PhpGrid('unknown');
        }

        $grid = new PhpGrid('person_activity_log');
        $grid->setAllowExport(false);
        $grid->setTitle('User Activity')
            ->setRowsPerPage(20)
            ->setSqlQuery("
            SELECT * FROM (
                SELECT 
                    syslogid
                    , grupi
                    , nengrupi
                    , from_unixtime(`data`, '%Y-%m-%d %H:%i') koha
                    , `data` AS dataregjistrimit
                    , veprimi
                    , ip
                    , browser
                FROM syslog 
                WHERE useri = " . UrlParser::getId() . "
            )l1 
");

        $grid->addColumn(new Column('syslogid', 'Id', false));
        $grid->addColumn(new Column('grupi', 'Group', true));
        $grid->addColumn(new Column('nengrupi', 'Subgroup', true));
        $grid->addColumn(new Column('koha', 'Date', true));
        $grid->addColumn(new Column('veprimi', 'Action', true));
        $grid->addColumn(new Column('ip', 'IP', true));
        $grid->addColumn(new Column('browser', 'Browser', true));
        $grid->setSortDetails('syslogid', 'DESC')
            ->setShowTitle(false)
            ->setShowSearchBar(false)
            ->setRowsPerPage(10);
        return $grid;
    }

    public static function getIcon(): ?string
    {
        return 'fas fa-users';
    }


    /**
     * @return bool
     */
    public function requiresDeviceApproval(): bool
    {
        return $this->getRequiresLoginDeviceApprovalVal() == 1;
    }

    public function isDeviceApproved(): bool
    {
        global $_COOKIE;
        $cookie = SessionHelper::getCookieDeviceId();
        if (strlen($cookie) < 1) {
            return false;
        }
        $now = date('Y-m-d H:i:s');

        $query = "
            SELECT
                id
            FROM person_login_device p 
            WHERE person_id = %s
            AND cookie = '%s'
            AND approved_by > 0
            AND record_status_id = " . RecordStatus::ACTIVE . "
            AND approved_on < '{$now}'
            AND expires_on > '{$now}'
        ";
        $authId = Db::getOne(sprintf($query, $this->getIdVal(), $cookie));
        if (!is_numeric($authId)) {
            return false;
        }
        $auth = new PersonLoginDevice($authId);
        if ($auth->getIpAddressVal() != $_SERVER['REMOTE_ADDR']
            || $auth->getUserAgentVal() != $_SERVER['HTTP_USER_AGENT']) {
            return false;
        }
        return true;
    }

    /**
     * @return PhpGrid
     */
    public function getUserDeviceGrid(): PhpGrid
    {
        if (!is_numeric(UrlParser::getId())) {
            return new PhpGrid('unknown');
        }

        $grid = new PhpGrid('person_device_list');
        $grid->setAllowExport(false);
        $grid->setTitle('Devices')
            ->setRowsPerPage(20)
            ->setSqlQuery(sprintf('
        SELECT * FROM (
            SELECT
           d.id
            ,d.created_on
            , d.device_name
            , d.approved_on
            , p.name as approved_by
            , d.ip_address
            , d.user_agent
            , rs.label as status
            , ll.last_login_date
            FROM person_login_device d
            LEFT JOIn person p on d.approved_by = p.id
            LEFT JOIN record_status rs on d.record_status_id = rs.id
            LEFT JOIN (
                SELECT
                    max(l.created_on) as last_login_date
                    , l.device_id
                FROM person_login_log l
                WHERE l.person_id = %1$s
                GROUP BY
                    l.device_id
            ) ll ON ll.device_id = d.id
            WHERE person_id = %1$s
        )l1 
', UrlParser::getId()));

        $grid->addColumn(new Column('id', 'Id', true));
        $grid->addColumn(new Column('device_name', 'Device Name', true));
        $grid->addColumn(new Column('status', 'Status', true));
        $grid->addColumn(new Column('created_on', 'Created On', true));
        $grid->addColumn(new Column('approved_on', 'Approved On', true));
        $grid->addColumn(new Column('approved_by', 'Approved By', true));
        $grid->addColumn(new Column('last_login_date', 'Last Login', true));
        $grid->addColumn(new Column('ip_address', 'IP Address', true));
        $grid->addColumn((new Column('user_agent', 'Browser', true))->setInnerElementCssStyle('font-size:10px;'));
        $grid->setSortDetails('id', 'DESC')
            ->setShowTitle(false)
            ->setShowSearchBar(false)
            ->setRowsPerPage(10);

        $grid->addActionButton((new ActionButton('Approve', sprintf("?mod=%s&action=approve_device&id=%s&device={id}", UrlParser::getModule(), UrlParser::getId()), 'fa fa-check'))->addAttribute('onclick', "return confirm('Sigurte?');"));
        $grid->addActionButton((new ActionButton('Reject', sprintf("?mod=%s&action=reject_device&id=%s&device={id}", UrlParser::getModule(), UrlParser::getId()), 'fas fa-trash'))->addAttribute('onclick', "return confirm('Sigurte?');"));
        return $grid;
    }
}

