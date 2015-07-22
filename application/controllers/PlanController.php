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
            if(preg_match("/(MP|EC|MPEC)/", $type = isset($_POST['type']) ? trim($_POST['type']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Type. MP/EC/MPEC is only acceptable", "Code" => "400")));
                exit;
            }

            if(preg_match("/[0-9]{1,3}/", $applicantId = isset($_POST['applicantId']) ? trim($_POST['applicantId']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Applicant ID.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[a-zA-Z\s\.]{1,35}/", $rqp = isset($_POST['rqp']) ? trim($_POST['rqp']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Address Name.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[0-9\.]{1,10}/", $amount = isset($_POST['amount']) ? trim($_POST['amount']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Amount.", "Code" => "400")));
                exit;
            }
            
            $this->load->model('Plan_model');
            echo json_encode($this->Plan_model->CreatePlan($type, $applicantId, $rqp, $amount));
        /*}
        else
            echo json_encode(array("status" => "error", "message" => array("Title" => "Authentication Failure.", "Code" => "401")));*/
    }
}