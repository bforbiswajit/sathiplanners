<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Applicant
 *
 * @ORM\Table(name="applicant")
 * @ORM\Entity
 */
class Applicant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=35, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="businessTitle", type="string", length=35, nullable=true)
     */
    private $businesstitle;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=10, nullable=false)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=30, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="addressLine", type="string", length=160, nullable=true)
     */
    private $addressline;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=20, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=20, nullable=false)
     */
    private $district;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=20, nullable=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="PIN", type="string", length=6, nullable=false)
     */
    private $pin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="datetime", nullable=true)
     */
    private $dob = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ma", type="datetime", nullable=true)
     */
    private $ma = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registeredOn", type="datetime", nullable=false)
     */
    private $registeredon = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=160, nullable=true)
     */
    private $notes;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Applicant
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set businesstitle
     *
     * @param string $businesstitle
     *
     * @return Applicant
     */
    public function setBusinesstitle($businesstitle)
    {
        $this->businesstitle = $businesstitle;

        return $this;
    }

    /**
     * Get businesstitle
     *
     * @return string
     */
    public function getBusinesstitle()
    {
        return $this->businesstitle;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return Applicant
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Applicant
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set addressline
     *
     * @param string $addressline
     *
     * @return Applicant
     */
    public function setAddressline($addressline)
    {
        $this->addressline = $addressline;

        return $this;
    }

    /**
     * Get addressline
     *
     * @return string
     */
    public function getAddressline()
    {
        return $this->addressline;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Applicant
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set district
     *
     * @param string $district
     *
     * @return Applicant
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Applicant
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set pin
     *
     * @param string $pin
     *
     * @return Applicant
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * Get pin
     *
     * @return string
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     *
     * @return Applicant
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set ma
     *
     * @param \DateTime $ma
     *
     * @return Applicant
     */
    public function setMa($ma)
    {
        $this->ma = $ma;

        return $this;
    }

    /**
     * Get ma
     *
     * @return \DateTime
     */
    public function getMa()
    {
        return $this->ma;
    }

    /**
     * Set registeredon
     *
     * @param \DateTime $registeredon
     *
     * @return Applicant
     */
    public function setRegisteredon($registeredon)
    {
        $this->registeredon = $registeredon;

        return $this;
    }

    /**
     * Get registeredon
     *
     * @return \DateTime
     */
    public function getRegisteredon()
    {
        return $this->registeredon;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Applicant
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
