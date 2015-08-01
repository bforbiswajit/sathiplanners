<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanDocument
 *
 * @ORM\Table(name="plan_document", indexes={@ORM\Index(name="plan_document_ibfk_1", columns={"planId"}), @ORM\Index(name="plan_document_ibfk_2", columns={"docId"})})
 * @ORM\Entity
 */
class PlanDocument
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
     * @ORM\Column(name="status", type="string", length=20, nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=160, nullable=false)
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
     * @var \Entities\Documents
     *
     * @ORM\ManyToOne(targetEntity="Entities\Documents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="docId", referencedColumnName="id")
     * })
     */
    private $docid;


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
     * Set status
     *
     * @param string $status
     *
     * @return PlanDocument
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return PlanDocument
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
     * Set notes
     *
     * @param string $notes
     *
     * @return PlanDocument
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
     * @return PlanDocument
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
     * Set docid
     *
     * @param \Entities\Documents $docid
     *
     * @return PlanDocument
     */
    public function setDocid(\Entities\Documents $docid = null)
    {
        $this->docid = $docid;

        return $this;
    }

    /**
     * Get docid
     *
     * @return \Entities\Documents
     */
    public function getDocid()
    {
        return $this->docid;
    }
}
