<?php

namespace Lavdiu\DemoApp;

use Laf\Database\Db;

/**
 * Class PersonLoginDevice
 * @package Asm
 * Main Class for Table person_login_device
 * This class inherits functionality from BasePersonLoginDevice.
 * It is generated only once, please include all logic and code here
 */
class PersonLoginDevice extends Base\BasePersonLoginDevice
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
     * @return PersonLoginDevice
     * @throws \Exception
     */
    public static function findOne(array $keyValuePairs): ?PersonLoginDevice
    {
        return parent::bOfindOne($keyValuePairs);
    }

    /**
     * @param array $keyValuePairs
     * @return PersonLoginDevice[]
     * @throws \Exception
     */
    public static function find(array $keyValuePairs): array
    {
        return parent::bOfind($keyValuePairs);
    }

    public static function getIcon(): ?string
    {
        return "fas fa-laptop";
    }


    /**
     * @param string|null $emriPaisjes
     * @return static
     * @throws \Laf\Exception\InvalidForeignKeyValue
     */
    public static function createNewInstance(?string $emriPaisjes = "Paisje e re"): static
    {
        $cookie = bin2hex(random_bytes(80));
        $expires = (time() + (3600 * 24 * 180));
        $r = new self();
        $r->setUserAgentVal($_SERVER['HTTP_USER_AGENT'])
            ->setIpAddressVal($_SERVER['REMOTE_ADDR'])
            ->setCookieVal($cookie)
            ->setRecordStatusIdVal(RecordStatus::PENDING)
            ->setPersonIdVal(Person::getLoggedUserId())
            ->setCreatedOnVal(date('Y-m-d H:i:s'))
            ->setDeviceNameVal($emriPaisjes)
            ->setExpiresOnVal(date('Y-m-d H:i:s', $expires)); // 180 dite
        $r->store();
        $r->requestApproval();

        setcookie('devsessid', $cookie, $expires);
        return $r;
    }

    public function requestApproval(): void
    {
        $e = new Email();
        $person = Person::getLoggedUserInstance();
        $raifi = new Person(Person::RAIF);
        $fatmiri = new Person(Person::FATMIR);

        $body = "<p><b>" . $person->getNameVal() . " provoj të kycet në ASM nga një paisje e panjohur. </b></p>";
        $body .= "<p>Në menyrë që {$person->getNameVal()} të ketë casjë në ASM nga kjo paisje, duhet miratimi i juaj.<br />Klikoni në linkun në vazhdim për të aprovuar apo kufizuar casjen: 
         <a href='https://ks.autopjesepartner.com/app/?module=person&submodule=&action=view&id={$person->getIdVal()}'>Shiko detalet</a>
         </p>";
        $body .= "<p>Detalet e paisjes: 
        <table>
            <tr>
                 <th style='text-align: left'>Emri i paisjes:</th>
                 <td>{$this->getDeviceNameVal()}</td>
            </tr>
             <tr>
                 <th style='text-align: left'>IP Adresa:</th>
                 <td>{$this->getIpAddressVal()}</td>
            </tr>
            <tr>
                 <th style='text-align: left'>Shfletuesi:</th>
                 <td>{$this->getUserAgentVal()}</td>
            </tr>
            <tr>
                 <th style='text-align: left'>Data:</th>
                 <td>{$this->getCreatedOnVal()}</td>
            </tr>
        </table>
        </p>";

        $body .= "<p>&nbsp;</p>";
        $body .= "<p><hr />AutoServiceManger<br />Ky mesazh është automatik, mos ktheni pergjegje</p>";

        $e->setSubjectVal('Kerkesë për casje nga një paisje e panohur nga  ' . $person->getNameVal());
        $e->setFieldValueHTML('body', $body);
        $e
            ->setEmailToVal($raifi->getEmailVal().';'.$fatmiri->getEmailVal().'; monitorues@autopjesepartner.com');

        $e->store();
        $e->send();

    }

    /**
     * @param string|null $cookie
     * @return static
     * @throws \Exception
     */
    public static function getDeviceByCookie(?string $cookie): self
    {
        $query = "
        SELECT
            id
        FROM person_login_device d 
            WHERE cookie = '%s'
        ";
        return new self(Db::getOne(sprintf($query, $cookie)));
    }

    public function isActive(): bool
    {
        if ($this->getRecordStatusIdVal() != RecordStatus::ACTIVE) {
            return false;
        }

        $createdOn = \DateTime::createFromFormat('Y-m-d H:i:s', $this->getCreatedOnVal());
        $expires = \DateTime::createFromFormat('Y-m-d H:i:s', $this->getExpiresOnVal());
        $now = new \DateTime();

        if ($createdOn > $now) {
            return false;
        }
        if ($expires > $now) {
            return false;
        }
        return true;
    }

    public function isPendingApproval(): bool
    {
        $createdOn = \DateTime::createFromFormat('Y-m-d H:i:s', $this->getCreatedOnVal());
        $expires = \DateTime::createFromFormat('Y-m-d H:i:s', $this->getExpiresOnVal());
        $now = new \DateTime();

        if ($this->getRecordStatusIdVal() == RecordStatus::PENDING
            && $createdOn < $now
            && $expires > $now
        ) {
            return true;
        }
        return false;
    }
}
