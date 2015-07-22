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
    
    public function CreatePlan($type, $applicantId, $rqp, $amount){
        $plan = new Entities\Plan;
        
        $plan->setType($type);
        $plan->setApplicantid($this->em->getRepository('Entities\Applicant')->find($applicantId));
        $plan->setRqp($rqp);
        $plan->setAmount($amount);
        
        $query = $con->prepare("select fileNo from plan where type = '$type' order by id desc limit 1");
        $query->execute();
        $data = $query->fetch();
        
        if($data == NULL)
            $fileNo = "SPPL/" . $type . "/1";
        else{
            $part = explode('/', $data);
            $fileNo = "SPPL" . $type . ++$part[2];  //SPPL/MPEC/1
        }
        
        $plan->setFileno($fileNo);
        //var_dump($applicant);exit;
        try
        {
            $this->em->persist($plan);
            $this->em->flush();
            
            $fileNumber = $plan->getFileno();
            return array("status" => "success", "data" => array("New Plan Added Successfully.\nFile No. " . $fileNumber));
        }
        catch(Exception $exc)
        {
            //return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
            return array("status" => "error", "message" => array("Title" => "Sorry, Failed to add new plan, please try again.", "Code" => "503"));
        }
    }
}