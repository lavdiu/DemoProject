<?php

namespace Lavdiu\DemoApp;

use Laf\Database\Db;
use Laf\Util\Settings;
use Laf\Util\Util;
use League\OAuth2\Client\Provider\Google;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;

/**
 * Class Email
 * @package asm
 * Main Class for Table email
 * This class inherits functionality from BaseEmail.
 * It is generated only once, please include all logic and code here
 */
class Email extends Base\BaseEmail
{
    /**
     * Instructors constructor.
     * @param int $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);
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
     * @return Email
     * @throws \Exception
     */
    public static function findOne(array $keyValuePairs): ?Email
    {
        return parent::bOfindOne($keyValuePairs);
    }

    /**
     * @param array $keyValuePairs
     * @return Email[]
     * @throws \Exception
     */
    public static function find(array $keyValuePairs): array
    {
        return parent::bOfind($keyValuePairs);
    }

    /**
     * Send the message
     * @return bool
     * @throws \Laf\Exception\InvalidForeignKeyValue
     * @throws \PHPMailer\PHPMailer\Exception
     * @throws \Exception
     */
    public function send()
    {
        $settings = Settings::getInstance();
        if (!$this->recordExists())
            $this->insert();
        $mail = $this->getPHPMailerInstance();
        $fromName = $settings->getProperty('comm.email_from_name');
        if(isDev()){
            $fromName .= " Test";
        }
        $mail->setFrom(Util::coalesce($this->getEmailFromVal(), $settings->getProperty('comm.email_from')), $fromName);

        foreach ($this->explodeEmailList($this->getEmailToVal()) as $toEmail) {
            $mail->addAddress(trim($toEmail));
        }

        if ($this->getEmailCcVal()) {
            foreach ($this->explodeEmailList($this->getEmailCcVal()) as $ccEmail) {
                $mail->addCC(trim($ccEmail));
            }
        }

        if ($this->getEmailBccVal()) {
            foreach ($this->explodeEmailList($this->getEmailBccVal()) as $bccEmail) {
                $mail->addBCC(trim($bccEmail));
            }
        }

        $mail->Subject = $this->getSubjectVal();
        $mail->msgHTML($this->getBodyVal());
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        foreach ($this->getAttachments() as $document) {
            if ($document->fileExists()) {
                $mail->addAttachment($document->getFullPath());
            }
        }

        if ($mail->send()) {
            $this->setSentOnVal(date('Y-m-d H:i:s'));
            $this->update();
            return true;
        } else {
            return false;
        }

    }

    private function getPHPMailerInstance()
    {
        $m = new PHPMailer();
        $m->isSMTP();
        $settings = Settings::getInstance();
        foreach ($settings->getProperty('email_smtp_config') as $setting => $value) {
            $m->$setting = $value;
        }

        $provider = new Google(
            [
                'clientId' => $settings->getProperty('comm.smtp.clientid'),
                'clientSecret' => $settings->getProperty('comm.smtp.secret')
            ]
        );

        $m->setOAuth(
            new OAuth(
                [
                    'provider' => $provider,
                    'clientId' => $settings->getProperty('comm.smtp.clientid'),
                    'clientSecret' => $settings->getProperty('comm.smtp.secret'),
                    'refreshToken' => $settings->getProperty('comm.smtp.refresh_token'),
                    'userName' => $settings->getProperty('comm.email_from')
                ]
            )
        );

        return $m;
    }

    /**
     * Gets an email string and returns an array
     * @param $emails
     * @return array
     */
    private function explodeEmailList($emails)
    {
        $arr = [];
        $emails = str_replace(';', ',', $emails);


        if (strpos($emails, ',')) {
            $arr = explode(',', $emails);
        } else {
            $arr[] = $emails;
        }
        return $arr;
    }

    /**
     * @return Document[]
     * @throws \Exception
     */
    public function getAttachments()
    {
        if (!$this->recordExists())
            return [];

        $sql = "SELECT document_id FROM email_attachment WHERE email_id = :id";
        $db = Db::getInstance();

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $this->getIdVal());
        $stmt->execute();
        $return = [];
        while ($res = $stmt->fetchAll()) {
            $return[] = new Document($res->document_id);
        }
        return $return;
    }

    public static function sendAsmErrorMessage(\Throwable $e): void
    {
        $user = Person::getLoggedUserInstance();
        $body = "
        <div>
            <h4>ASM Exception</h4>
            <b>User:</b> {$user->getIdVal()} {$user->getNameVal()}<br />
            <b>Time:</b> " . date('Y-m-d H:i:s') . "<br />
            <b>URI:</b> {$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}
            <hr>
            <b>Message:</b> <pre style='background-color: #eeeeee;'>{$e->getMessage()}</pre>
            <b>Stack Trace:</b> <pre style='background-color: #eeeeee;'>" . $e->getTraceAsString() . "</pre>
            <hr>
            <b>_POST:</b> <pre style='background-color: #eeeeee;'>" . print_r($_POST, true) . "</pre><br />
            <b>_GET:</b> <pre style='background-color: #eeeeee;'>" . print_r($_GET, true) . "</pre><br />
            <b>_COOKIE:</b> <pre style='background-color: #eeeeee;'>" . print_r($_COOKIE, true) . "</pre><br />
            <b>_SESSION:</b> <pre style='background-color: #eeeeee;'>" . print_r($_SESSION, true) . "</pre><br />
            <b>_SERVER:</b> <pre style='background-color: #eeeeee;'>" . print_r($_SERVER, true) . "</pre>
        </div>
        ";
        $e = new Email();
        $e->setEmailToVal(Settings::get('asm.exception_notification_recipient.email'))
            ->setSubjectVal('ASM Exception occurred on '.date('Y-m-d H:i'))
            ->setFieldValueHTML('body', $body);
        $e->send();

    }

}
