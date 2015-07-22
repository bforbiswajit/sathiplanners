<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @ORM\Table(name="events")
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
     * @var integer
     *
     * @ORM\Column(name="minesId", type="integer", nullable=false)
     */
    private $minesid;

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
     * @ORM\Column(name="notes", type="string", length=255, nullable=false)
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
     * Set minesid
     *
     * @param integer $minesid
     *
     * @return Events
     */
    public function setMinesid($minesid)
    {
        $this->minesid = $minesid;
    
        return $this;
    }

    /**
     * Get minesid
     *
     * @return integer
     */
    public function getMinesid()
    {
        return $this->minesid;
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
}

