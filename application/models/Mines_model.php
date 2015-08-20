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
    
    public function CreateMines($area, $leasType, $district, $mouza, $notes, $fileNo){
        //$planId = fileNoToPlanId($fileNo);
        $plan = $this->doctrine->em->getRepository('Entities\Plan')->findOneBy(array("fileno" => $fileNo));
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
        $mines->setPlanid($plan->getId());
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
}