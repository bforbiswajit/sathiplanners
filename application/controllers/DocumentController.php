<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class DocumentController extends CI_Controller
{
    public function index()
    {
        echo "Default Controller Action For Document.";
    }
    
    public function AddNew(){
        /*if(isset($_SESSION['adminId']) && ($adminId = $_SESSION['adminId']) != "")
        {*/
            if(preg_match("/[a-zA-Z0-9\s\S\-\_\.\,\'\/\\]{1,255}/", $name = isset($_POST['name']) ? trim($_POST['name']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Document Title.", "Code" => "400")));
                exit;
            }

            $this->load->model('Document_model');
            echo json_encode($this->Document_model->CreateDocument($name));
        /*}
        else
            echo json_encode(array("status" => "error", "message" => array("Title" => "Authentication Failure.", "Code" => "401")));*/
    }
    
    public function Attach(){
        /*if(isset($_SESSION['adminId']) && ($adminId = $_SESSION['adminId']) != "")
        {*/
            if(preg_match("/SPPL\/(MP|EC|MPEC)\/[0-9]{1,3}/", $fileNo = isset($_POST['fileNo']) ? trim($_POST['fileNo']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid File No (Example - SPPL/MPEC/15).", "Code" => "400")));
                exit;
            }

            if(preg_match("/[0-9]{1,2}/", $docId = isset($_POST['docId']) ? trim($_POST['docId']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Document ID.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[a-zA-Z0-9\s\S]{1,20}/", $status = isset($_POST['status']) ? trim($_POST['status']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Status.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[a-zA-Z0-9\s\S\-\_\,\.@]{1,20}/", $notes = isset($_POST['notes']) ? trim($_POST['notes']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid State Name.", "Code" => "400")));
                exit;
            }
            
            $this->load->model('Document_model');
            echo json_encode($this->Document_model->AttachDocument($fileNo, $docId, $status, $notes));
        /*}
        else
            echo json_encode(array("status" => "error", "message" => array("Title" => "Authentication Failure.", "Code" => "401")));*/
    }
}