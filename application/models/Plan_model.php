<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */
defined('BASEPATH') OR exit('Forbidden!');

class Plan_model extends CI_Model {
    public $em;
    public function __construct()
    {
        parent::__construct();
        //$this->load->library('upload');
        $this->em = $this->doctrine->em;
    }
    
    public function CreatePlan($type, $applicantId, $dateOfRegistration, $rqp, $amount){
        $plan = new Entities\Plan;
        
        $plan->setType($type);
        $plan->setApplicantid($this->em->getRepository('Entities\Applicant')->find($applicantId));
        if($dateOfRegistration == NULL)
            $plan->setDateofregistration(new \DateTime("now"));
        else
            $plan->setDateofregistration(new \DateTime((string)$dateOfRegistration));
        
        $plan->setRqp($rqp);
        $plan->setAmount($amount);
        $plan->setStatus(0);
        
        $con = $this->em->getConnection();
        $query = $con->prepare("select fileNo from plan where type = '$type' order by id desc limit 1");
        $query->execute();
        $data = $query->fetch();
        
        if($data == NULL || $data == FALSE)
            $fileNo = "SPPL/" . $type . "/1";
        else{
            $part = explode('/', $data['fileNo']);
            $fileNo = "SPPL/" . $type . "/" . ++$part[2];  //SPPL/MPEC/1
        }
        
        $plan->setFileno($fileNo);
        try
        {
            $this->em->persist($plan);
            $this->em->flush();
            
            $fileNumber = $plan->getFileno();
            $data['err_msg'] = "";
            $data['success_msg'] = "New Plan Added Successfully.\nFile No. " . $fileNumber;
            $this->session->set_userdata($data);
            //return TRUE;
            return array("status" => "success", "data" => array("New Plan Added Successfully.\nFile No. " . $fileNumber));
        }
        catch(Exception $exc)
        {
            //return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
            return array("status" => "error", "message" => array("Title" => "Sorry, Failed to add new plan, please try again.", "Code" => "503"));
        }
    }
    
    public function planListing(){
        $allPlans = $this->doctrine->em->getRepository('Entities\Plan')->findAll();
        $data = array();
        for($i = 0; $i < count($allPlans); $i++){
            $plan = new stdClass();
            $plan->id = $allPlans[$i]->getId();
            $plan->fileNo = $allPlans[$i]->getFileno();
            $plan->type = $allPlans[$i]->getType();
            $plan->applicant = $allPlans[$i]->getApplicantid()->getName();
            $plan->registeredOn = $allPlans[$i]->getDateofregistration();
            $plan->rqp = $allPlans[$i]->getRqp();
            $plan->amount = $allPlans[$i]->getAmount();
            $plan->status = $allPlans[$i]->getStatus();
            
            $data[$i] = $plan;
        }
        if(count($data) > 0)
            return array("status" => "success", "data" => $data);
        return array("status" => "error", "message" => "No data found.");
    }
}