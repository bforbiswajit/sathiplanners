<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */
defined('BASEPATH') OR exit('Forbidden!');

class Mines_model extends CI_Model {
    public $em;
    public function __construct()
    {
        parent::__construct();
        //$this->load->library('upload');
        $this->em = $this->doctrine->em;
        $this->load->helper('fileNo');
    }
    
    public function CreateMines($area, $district, $mouza, $notes, $fileNo){
        $planId = fileNoToPlanId($fileNo);
        if($planId == NULL)
            return array("status" => "error", "message" => array("Title" => "Sorry, File No. Not Found.", "Code" => "503"));
        
        $mines = new Entities\Mines;
        
        $mines->setArea($area);
        $mines->setDistrict($district);
        $mines->setMouza($mouza);
        $mines->setNotes($notes);
        $mines->setPlanid($planId);
        try
        {
            $this->em->persist($mines);
            $this->em->flush();
            
            return array("status" => "success", "data" => array("New Mines Added Successfully."));
        }
        catch(Exception $exc)
        {
            //return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
            return array("status" => "error", "message" => array("Title" => "Sorry, Failed to add new mines, please try again.", "Code" => "503"));
        }
    }
}