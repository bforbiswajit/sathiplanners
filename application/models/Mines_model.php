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
        //$this->load->helper('utilities');
    }
    
    public function CreateMines($area, $leasType, $district, $mouza, $notes, $fileNo, $coOrdinate){
        //$planId = fileNoToPlanId($fileNo);
        $plan = $this->em->getRepository('Entities\Plan')->findOneBy(array("fileno" => strtoupper($fileNo)));
        if($plan == FALSE){
            $data['err_msg_mine'] = "Please insert a valid File No. Error Code #400.";
            $this->session->set_userdata($data);
            return FALSE;
            //return array("status" => "error", "message" => array("Title" => "Sorry, File No. Not Found.", "Code" => "503"));
        }
        
        $mines = new Entities\Mines;
        
        $mines->setArea($area);
        $mines->setDistrict($district);
        $mines->setLeastype($leasType);
        $mines->setMouza($mouza);
        $mines->setNotes($notes);
        $mines->setPlanid($plan);
        $mines->setLatlng($coOrdinate);
        try
        {
            $this->em->persist($mines);
            $this->em->flush();
            
            $data['err_msg_mine'] = "";
            $data['success_msg_mine'] = "New Mines Added Successfully.";
            $this->session->set_userdata($data);
            return TRUE;
        }
        catch(Exception $exc)
        {
            $data['success_msg_mine'] = "";
            $data['err_msg_mine'] = "Sorry, Failed to add new mines, Please try again later. Error Code: #503.";
            $this->session->set_userdata($data);
            return FALSE;
            //return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
            //return array("status" => "error", "message" => array("Title" => "Sorry, Failed to add new mines, please try again.", "Code" => "503"));
        }
    }
    
    public function minesListing(){
        $allMines = $this->em->getRepository('Entities\Mines')->findAll();
        $data = array();
        for($i = 0; $i < count($allMines); $i++){
            $mine = new stdClass();
            $mine->id = $allMines[$i]->getId();
            $mine->fileNo = $this->em->getRepository('Entities\Plan')->find($allMines[$i]->getPlanid())->getFileno();
            $mine->area = $allMines[$i]->getArea();
            $mine->leasType = $allMines[$i]->getLeastype();
            $mine->district = $allMines[$i]->getDistrict();
            $mine->mouza = $allMines[$i]->getMouza();
            $mine->notes = $allMines[$i]->getNotes();
            
            $data[$i] = $mine;
        }
        if(count($data) > 0)
            return array("status" => "success", "data" => $data);
        return array("status" => "error", "message" => "No data found.");
    }
}