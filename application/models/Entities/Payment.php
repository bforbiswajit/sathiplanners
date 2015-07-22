<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 *
 * @ORM\Table(name="payment", indexes={@ORM\Index(name="payment_ibfk_1", columns={"planId"})})
 * @ORM\Entity
 */
class Payment
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
     * @var float
     *
     * @ORM\Column(name="amount", type="float", precision=10, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="mode", type="string", length=20, nullable=false)
     */
    private $mode;

    /**
     * @var \Entities\Plan
     *
     * @ORM\ManyToOne(targetEntity="Entities\Plan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="planId", referencedColumnName="id")
     * })
     */
    private $planid;


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
     * Set amount
     *
     * @param float $amount
     *
     * @return Payment
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Payment
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set mode
     *
     * @param string $mode
     *
     * @return Payment
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    
        return $this;
    }

    /**
     * Get mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set planid
     *
     * @param \Entities\Plan $planid
     *
     * @return Payment
     */
    public function setPlanid(\Entities\Plan $planid = null)
    {
        $this->planid = $planid;
    
        return $this;
    }

    /**
     * Get planid
     *
     * @return \Entities\Plan
     */
    public function getPlanid()
    {
        return $this->planid;
    }
}
