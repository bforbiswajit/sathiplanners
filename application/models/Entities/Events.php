<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @ORM\Table(name="events", indexes={@ORM\Index(name="events_ibfk_1", columns={"planId"})})
 * @ORM\Entity
 */
class Events
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
     * @ORM\Column(name="type", type="string", length=30, nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="doneBy", type="string", length=35, nullable=false)
     */
    private $doneby;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true)
     */
    private $notes;

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
     * Set type
     *
     * @param string $type
     *
     * @return Events
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Events
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
     * Set doneby
     *
     * @param string $doneby
     *
     * @return Events
     */
    public function setDoneby($doneby)
    {
        $this->doneby = $doneby;

        return $this;
    }

    /**
     * Get doneby
     *
     * @return string
     */
    public function getDoneby()
    {
        return $this->doneby;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Events
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

    /**
     * Set planid
     *
     * @param \Entities\Plan $planid
     *
     * @return Events
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
