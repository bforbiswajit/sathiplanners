<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */
defined('BASEPATH') OR exit('Forbidden!');

class Applicant_model extends CI_Model {
    public $em;
    public function __construct()
    {
        parent::__construct();
        //$this->load->library('upload');
        $this->em = $this->doctrine->em;
    }
    
    public function CreateApplicant($name, $businessTitle, $mobile, $email, $addressLine, $city, $district, $state, $pin, $dob, $ma, $notes){
        $thisUser = $this->em->getRepository('Entities\Applicant')->findBy(array('mobile' => $mobile));
        if(is_array($thisUser) && !empty($thisUser))
        {
            return array("status" => "error", "message" => array("Title" => "Sorry, mobile number already exists.", "Code" => "400"));
        }
        
        $applicant = new Entities\Applicant;
        
        $applicant->setName($name);
        $applicant->setBusinesstitle($businessTitle);
        $applicant->setMobile($mobile);
        $applicant->setEmail($email);
        $applicant->setAddressline($addressLine);
        $applicant->setCity($city);
        $applicant->setDistrict($district);
        $applicant->setState($state);
        $applicant->setPin($pin);
        $applicant->setDob(($dob == NULL) ? NULL : new \DateTime((string)$dob));
        $applicant->setMa(($ma == NULL) ? NULL : new \DateTime((string)$ma));
        /*$applicant->setDob(new \DateTime("now"));
        $applicant->setMa(new \DateTime("now"));*/
        $applicant->setNotes($notes);
        //var_dump($applicant);exit;
        try
        {
            $this->em->persist($applicant);
            $this->em->flush();
            
            $thisUser = $user->getId();
            return array("status" => "success", "data" => array("New Applicant Added Successfully."));
        }
        catch(Exception $exc)
        {
            return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
            //return array("status" => "error", "message" => array("Title" => "Sorry, Failed to add new applicant, please try again.", "Code" => "503"));
        }
    }
    
    public function ReadApplicant(){
        $allApplicants = $this->em->getRepository('Entities\Applicant')->findAll();
        
        $data = new stdClass();
        $data->applicants = array();
        for($i = 0; $i < count($allApplicants); $i++){
            $applicant = new stdClass();
            $applicant->name = $allApplicants[$i]->getName();
            $applicant->businessTitle = $allApplicants[$i]->getBusinesstitle();
            $data->applicants[$i] = $applicant;
        }
        return array("status" => "success", "data" => $data);
    }
}