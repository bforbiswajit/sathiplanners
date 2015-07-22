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
}