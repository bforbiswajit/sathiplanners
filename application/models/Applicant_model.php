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
        $thisUser = $this->em->getRepository('Entities\Applicant')->findOneBy(array('mobile' => $mobile));
        if($thisUser != NULL)
        {
            $data = $this->session->userdata();
            $data['err_msg_applicant'] = "Sorry, mobile number already exists. Probably duplicate entry, please recheck. Error Code #400.";
            $data['success_msg_applicant'] = "";
            $this->session->set_userdata($data);
            redirect('applicant');
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
            
            $data = $this->session->userdata();
            $data['err_msg_applicant'] = "";
            $data['success_msg_applicant'] = "New Applicant Added Successfully.";
            $this->session->set_userdata($data);
            return TRUE;
        }
        catch(Exception $exc)
        {
            $data = $this->session->userdata();
            $data['success_msg_applicant'] = "";
            $data['err_msg_applicant'] = "Sorry, failed to add applicant, Please try again later. Error Code: #503.";
            $this->session->set_userdata($data);
            return FALSE;
            //return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
            //return array("status" => "error", "message" => array("Title" => "Sorry, Failed to add new applicant, please try again.", "Code" => "503"));
        }
    }
    
    public function ReadPartialApplicant($key){
        $con = $this->em->getConnection();
        $query = $con->prepare("select id, name, businessTitle, city, mobile from applicant where id like '" . $key . "%' or name like '" . $key . "%' or businessTitle like '" . $key . "%' or city like '" . $key . "%'");
        $query->execute();
        $data = $query->fetchAll();
        
        return ($data != NULL || $data != FALSE) ? json_encode(array("status" => "success", "data" => $data)) : json_encode(array("status" => "fail", "data" => "--No Match Found."));
    }
    
    public function ReadApplicant($applicantId){
        $thisApplicant = $this->em->getRepository('Entities\Applicant')->find($applicantId);
        
        $applicant = array();
        $applicant['id'] = $thisApplicant->getId();
        $applicant['name'] = $thisApplicant->getName();
        $applicant['businessTitle'] = $thisApplicant->getBusinesstitle();
        $applicant['mobile'] = $thisApplicant->getMobile();
        $applicant['email'] = $thisApplicant->getEmail();
        $applicant['addressLine'] = $thisApplicant->getAddressline();
        $applicant['city'] = $thisApplicant->getCity();
        $applicant['district'] = $thisApplicant->getDistrict();
        $applicant['state'] = $thisApplicant->getState();
        $applicant['pin'] = $thisApplicant->getPin();
        if($thisApplicant->getDob() != NULL){
            $tmp = explode(" ", $thisApplicant->getDob()->format("Y-m-d"));
            $applicant['dob'] = $tmp[0];
        }
        else
            $applicant['dob'] = "";
        if($thisApplicant->getMa() != NULL){
            $tmp = explode(" ", $thisApplicant->getMa()->format("Y-m-d"));
            $applicant['ma'] = $tmp[0];
        }
        else
            $applicant['ma'] = "";
        
        $applicant['registeredOn'] = $thisApplicant->getRegisteredon();
        $applicant['notes'] = $thisApplicant->getNotes();
        
        return $applicant;
    }
    
    public function UpdateApplicant($updateFields, $applicantId){
        $applicant = new Entities\Applicant;
        $thisApplicant = $this->em->getRepository('Entities\Applicant')->findBy(array("mobile" => $updateFields['mobile']));
        if($thisApplicant == FALSE || (count($thisApplicant) == 1 && $thisApplicant[0]->getId() == $applicantId)){
            try
            {
                $this->db->update('applicant', $updateFields, array("id" => $applicantId));
                $data = $this->session->userdata();
                $data['err_msg_view_applicant'] = "";
                $data['success_msg_view_applicant'] = "Applicant Details Updated Successfully.";
                $this->session->set_userdata($data);
                return TRUE;
            }
            catch(Exception $exc)
            {
                $data = $this->session->userdata();
                $data['err_msg_view_applicant'] = "Sorry, Failed To Update Applicant Details. #Error Code 500.";
                $data['success_msg_view_applicant'] = "";
                $this->session->set_userdata($data);
                return FALSE;
            }
        }else{
            $data = $this->session->userdata();
            $data['err_msg_view_applicant'] = "Sorry, Failed To Update. Mobile no. already available with " . $thisApplicant[0]->getName() . ".";
            $data['success_msg_view_applicant'] = "";
            $this->session->set_userdata($data);
            return FALSE;
        }
    }
    
    public function applicantListing(){
        $allApplicants = $this->em->getRepository('Entities\Applicant')->findBy(array(), array("name" => "ASC"));
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