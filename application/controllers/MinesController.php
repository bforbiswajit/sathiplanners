<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class PlanController extends CI_Controller
{
    public function index()
    {
        echo "Default Controller Action For Applicant.";
    }
    
    public function AddNew(){
        /*if(isset($_SESSION['adminId']) && ($vendorId = $_SESSION['adminId']) != "")
        {*/
            if(preg_match("/[0-9\.]{1,5}/", $area = isset($_POST['area']) ? trim($_POST['area']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Area Value.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[a-zA-Z]{1,20}/", $district = isset($_POST['district']) ? trim($_POST['district']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid District Name.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[a-zA-Z]{1,20}/", $mouza = isset($_POST['mouza']) ? trim($_POST['mouza']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Mouza.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[a-zA-Z]{1,20}/", $notes = isset($_POST['notes']) ? trim($_POST['notes']) : "") == 0)
            {
                $notes = "";
            }
            
            if(preg_match("/SPPL\/(MP|EC|MPEC)\/[0-9]{1,3}/", $fileNo = isset($_POST['fileNo']) ? trim($_POST['fileNo']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid File No (Example - SPPL/MPEC/15).", "Code" => "400")));
                exit;
            }
            
            $this->load->model('Mines_model');
            echo json_encode($this->Mines_model->CreateMines($area, $district, $mouza, $notes, $fileNo));
        /*}
        else
            echo json_encode(array("status" => "error", "message" => array("Title" => "Authentication Failure.", "Code" => "401")));*/
    }
}