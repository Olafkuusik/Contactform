<?php
/**
 * Created by PhpStorm.
 * User: Olaf
 * Date: 9.01.2017
 * Time: 10:44
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity
 * @ORM\Table(name="contacts")
 */
class Contacts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $firstname;
    /**
     * @ORM\Column(type="string")
     */
    private $lastname;
    /**
     * @ORM\Column(type="datetime")
     */
    private $bday;
    /**
     * @ORM\Column(type="integer")
     */
    private $phonenumber;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $address;

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getBday()
    {
        return $this->bday;
    }

    /**
     * @param mixed $bday
     */
    public function setBday($bday)
    {
        $this->bday = $bday;
    }

    /**
     * @return mixed
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * @param mixed $phonenumber
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

}