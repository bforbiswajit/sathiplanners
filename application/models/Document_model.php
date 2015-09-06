<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class Document_model extends CI_Model {
    public $em;
    public function __construct()
    {
        parent::__construct();
        //$this->load->library('upload');
        $this->em = $this->doctrine->em;
    }
    
    public function CreateDocument($name){
        $document = new Entities\Documents;
        
        $document->setName($name);
        try
        {
            $this->em->persist($document);
            $this->em->flush();
            
            return array("status" => "success", "data" => array("New Document Added To List Successfully."));
        }
        catch(Exception $exc)
        {
            //return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
            return array("status" => "error", "message" => array("Title" => "Sorry, Failed to add new document, please try again.", "Code" => "503"));
        }
    }
    
    public function AttachDocument($fileNo, $docId, $status, $notes){
        $planId = fileNoToPlanId($fileNo);
        if($planId == NULL)
            return array("status" => "error", "message" => array("Title" => "Sorry, File No. Not Found.", "Code" => "503"));
        
        if(($document = $this->em->getRepository('Entities\Documents')->find($docId)) == NULL)
            return array("status" => "error", "message" => array("Title" => "Sorry, Document Not Found.", "Code" => "503"));
        
        $attachment = new Entities\PlanDocument;
        
        $attachment->setPlanid($planId);
        $attachment->setDocid($document->getId());
        $attachment->setStatus($status);
        $attachment->setNotes($notes);
        try
        {
            $this->em->persist($attachment);
            $this->em->flush();
            
            return array("status" => "success", "data" => array("Document Attached Successfully."));
        }
        catch(Exception $exc)
        {
            //return array("status" => "error", "message" => array("Title" => $exc->getTraceAsString(), "Code" => "503"));
            return array("status" => "error", "message" => array("Title" => "Sorry, Failed to attach document, please try again.", "Code" => "503"));
        }
    }
    
    public function ReadPendingDocument($fileNo){
        $plan = $this->em->getRepository('Entities\Plan')->findOneBy(array("fileno" => strtoupper($fileNo)));
        if($plan == FALSE)
            return array("status" => "error", "message" => array("Title" => "Sorry, File Not Found.", "Code" => "400"));
        
        $allDocuments = $this->em->getRepository('Entities\Documents')->findBy(array(), array("name" => "ASC"));
        $data = array();
        if($allDocuments != FALSE){
            for($i = 0; $i < count($allDocuments); $i++){
                $doc = $this->em->getRepository('Entities\PlanDocument')->findOneBy(array("planid" => $plan->getId(), "docid" => $allDocuments[$i]->getId()));
                if($doc != FALSE){
                    if($doc->getStatus() == "pending")
                        $data[$doc->getId()] = "Pending";
                    elseif($doc->getStatus() == "received")
                        $data[$doc->getId()] = "Received";
                }
            }
            
            //return all doc name and if pending or received or not required
            if(count($data) > 0)
                return array("status" => "success", "data" => $data);
            return array("status" => "error", "message" => "No data found.");
        }
        else
        {
            $data = $this->session->userdata();
            $data['err_msg_attach_doc'] = "Required Document List is Empty. Please Mention Some Documents First. Error Code #400.";
            $data['success_msg_attach_doc'] = "";
            $this->session->set_userdata($data);
            redirect('document');
        }
    }
    
    public function documentListing(){
        $allDocuments = $this->em->getRepository('Entities\Documents')->findBy(array(), array("name" => "ASC"));
        $data = array();
        if($allDocuments != FALSE){
            for($i = 0; $i < count($allDocuments); $i++){
                $docItem = new stdClass();

                $docItem->id = $allDocuments[$i]->getId();
                $docItem->name = $allDocuments[$i]->getName();
                $pendings = $this->em->getRepository('Entities\PlanDocument')->findBy(array("docid" => $allDocuments[$i]->getId(), "status" => "pending"));
                $docItem->pending = ($pendings == FALSE) ? 0 : count($pendings);

                $receiveds = $this->em->getRepository('Entities\PlanDocument')->findBy(array("docid" => $allDocuments[$i]->getId(), "status" => "received"));
                $docItem->received = ($receiveds == FALSE) ? 0 : count($received);

                $data[$i] = $docItem;
            }
        }
        
        if(count($data) > 0)
            return array("status" => "success", "data" => $data);
        return array("status" => "error", "message" => "No data found.");
    }
}