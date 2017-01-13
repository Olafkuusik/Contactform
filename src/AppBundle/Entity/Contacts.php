<?php
/**
 * Created by PhpStorm.
 * User: Olaf
 * Date: 9.01.2017
 * Time: 10:44
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity
 * @ORM\Table(name="contacts")
 */
class Contacts //Mapping & Form validation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $firstname;
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $lastname;
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="datetime")
     */
    private $birthday;
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="integer")
     */
    private $phonenumber;
    /**
     * @ORM\Column(type="string", nullable=True)
     */
    private $address;
    /**
     * @ORM\Column(type="boolean")
     */
    private $isFamily = false;

// Setters & Getters are below here

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

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
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
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
    /**
     * @return mixed
     */
    public function getIsFamily()
    {
        return $this->isFamily;
    }

    /**
     * @param mixed $isFamily
     */
    public function setIsFamily($isFamily)
    {
        $this->isFamily = $isFamily;
    }
}