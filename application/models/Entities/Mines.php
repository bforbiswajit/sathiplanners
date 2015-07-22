<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mines
 *
 * @ORM\Table(name="mines", indexes={@ORM\Index(name="mines_ibfk_1", columns={"planId"})})
 * @ORM\Entity
 */
class Mines
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
     * @ORM\Column(name="area", type="float", precision=10, scale=0, nullable=false)
     */
    private $area;

    /**
     * @var string
     *
     * @ORM\Column(name="leasType", type="string", length=30, nullable=false)
     */
    private $leastype;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=20, nullable=false)
     */
    private $district;

    /**
     * @var string
     *
     * @ORM\Column(name="mouza", type="string", length=20, nullable=false)
     */
    private $mouza;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=160, nullable=true)
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
     * Set area
     *
     * @param float $area
     *
     * @return Mines
     */
    public function setArea($area)
    {
        $this->area = $area;
    
        return $this;
    }

    /**
     * Get area
     *
     * @return float
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set leastype
     *
     * @param string $leastype
     *
     * @return Mines
     */
    public function setLeastype($leastype)
    {
        $this->leastype = $leastype;
    
        return $this;
    }

    /**
     * Get leastype
     *
     * @return string
     */
    public function getLeastype()
    {
        return $this->leastype;
    }

    /**
     * Set district
     *
     * @param string $district
     *
     * @return Mines
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
     * Set mouza
     *
     * @param string $mouza
     *
     * @return Mines
     */
    public function setMouza($mouza)
    {
        $this->mouza = $mouza;
    
        return $this;
    }

    /**
     * Get mouza
     *
     * @return string
     */
    public function getMouza()
    {
        return $this->mouza;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Mines
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
     * @return Mines
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
