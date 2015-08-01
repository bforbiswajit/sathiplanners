<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanEvent
 *
 * @ORM\Table(name="plan_event", indexes={@ORM\Index(name="plan_event_ibfk_1", columns={"planId"}), @ORM\Index(name="plan_event_ibfk_2", columns={"eventId"})})
 * @ORM\Entity
 */
class PlanEvent
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
     * @var \Entities\Plan
     *
     * @ORM\ManyToOne(targetEntity="Entities\Plan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="planId", referencedColumnName="id")
     * })
     */
    private $planid;

    /**
     * @var \Entities\Events
     *
     * @ORM\ManyToOne(targetEntity="Entities\Events")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="eventId", referencedColumnName="id")
     * })
     */
    private $eventid;


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
     * Set planid
     *
     * @param \Entities\Plan $planid
     *
     * @return PlanEvent
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

    /**
     * Set eventid
     *
     * @param \Entities\Events $eventid
     *
     * @return PlanEvent
     */
    public function setEventid(\Entities\Events $eventid = null)
    {
        $this->eventid = $eventid;

        return $this;
    }

    /**
     * Get eventid
     *
     * @return \Entities\Events
     */
    public function getEventid()
    {
        return $this->eventid;
    }
}
