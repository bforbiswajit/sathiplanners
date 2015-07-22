<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plan
 *
 * @ORM\Table(name="plan", uniqueConstraints={@ORM\UniqueConstraint(name="fileNo", columns={"fileNo"})}, indexes={@ORM\Index(name="plan_ibfk_1", columns={"applicantId"})})
 * @ORM\Entity
 */
class Plan
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
     * @ORM\Column(name="type", type="string", length=15, nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOfRegistration", type="datetime", nullable=false)
     */
    private $dateofregistration = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="RQP", type="string", length=35, nullable=false)
     */
    private $rqp;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", precision=10, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="fileNo", type="string", length=20, nullable=false)
     */
    private $fileno;

    /**
     * @var \Entities\Applicant
     *
     * @ORM\ManyToOne(targetEntity="Entities\Applicant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="applicantId", referencedColumnName="id")
     * })
     */
    private $applicantid;


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
     * Set type
     *
     * @param string $type
     *
     * @return Plan
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set dateofregistration
     *
     * @param \DateTime $dateofregistration
     *
     * @return Plan
     */
    public function setDateofregistration($dateofregistration)
    {
        $this->dateofregistration = $dateofregistration;
    
        return $this;
    }

    /**
     * Get dateofregistration
     *
     * @return \DateTime
     */
    public function getDateofregistration()
    {
        return $this->dateofregistration;
    }

    /**
     * Set rqp
     *
     * @param string $rqp
     *
     * @return Plan
     */
    public function setRqp($rqp)
    {
        $this->rqp = $rqp;
    
        return $this;
    }

    /**
     * Get rqp
     *
     * @return string
     */
    public function getRqp()
    {
        return $this->rqp;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return Plan
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set fileno
     *
     * @param string $fileno
     *
     * @return Plan
     */
    public function setFileno($fileno)
    {
        $this->fileno = $fileno;
    
        return $this;
    }

    /**
     * Get fileno
     *
     * @return string
     */
    public function getFileno()
    {
        return $this->fileno;
    }

    /**
     * Set applicantid
     *
     * @param \Entities\Applicant $applicantid
     *
     * @return Plan
     */
    public function setApplicantid(\Entities\Applicant $applicantid = null)
    {
        $this->applicantid = $applicantid;
    
        return $this;
    }

    /**
     * Get applicantid
     *
     * @return \Entities\Applicant
     */
    public function getApplicantid()
    {
        return $this->applicantid;
    }
}

