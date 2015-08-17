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
        $applicant->setRegisteredon(new \DateTime("now"));
        $applicant->setNotes($notes);
        //var_dump($applicant);exit;
        try
        {
            $this->em->persist($applicant);
            $this->em->flush();
            
            $data['err_msg'] = "";
            $data['success_msg'] = "New Applicant Added Successfully.";
            $this->session->set_userdata($data);
            return TRUE;
        }
        catch(Exception $exc)
        {
            $data['err_msg'] = "Sorry, failed to add applicant, Please try again later. Error Code: #503.";
            $this->session->set_userdata($data);
            return FALSE;
            //return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
            //return array("status" => "error", "message" => array("Title" => "Sorry, Failed to add new applicant, please try again.", "Code" => "503"));
        }
    }
    
    public function ReadApplicant($key){
        $con = $this->em->getConnection();
        $query = $con->prepare("select id, name, businessTitle, city from applicant where id like '" . $key . "%' or name like '" . $key . "%' or businessTitle like '" . $key . "%' or city like '" . $key . "%'");
        $query->execute();
        $data = $query->fetchAll();
        
        return ($data != NULL || $data != FALSE) ? json_encode(array("status" => "success", "data" => $data)) : json_encode(array("status" => "fail", "data" => "--No Match Found."));
    }
    
    public function applicantListing(){
        $allApplicants = $this->doctrine->em->getRepository('Entities\Applicant')->findAll();
        $data = array();
        for($i = 0; $i < count($allApplicants); $i++){
            $applicant = new stdClass();
            $applicant->id = $allApplicants[$i]->getId();
            $applicant->name = $allApplicants[$i]->getName();
            $applicant->businessTitle = $allApplicants[$i]->getBusinesstitle();
            $applicant->mobile = $allApplicants[$i]->getMobile();
            $applicant->city = $allApplicants[$i]->getCity();
            $applicant->district = $allApplicants[$i]->getDistrict();
            $applicant->registeredOn = $allApplicants[$i]->getRegisteredon();
            
            $data[$i] = $applicant;
        }
        if(count($data) > 0)
            return array("status" => "success", "data" => $data);
        return array("status" => "error", "message" => "No data found.");
    }
}