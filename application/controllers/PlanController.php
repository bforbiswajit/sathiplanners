<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class PlanController extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
    }
    
    public function index()
    {
        if($this->session->userdata('userId'))
        {
            //$this->load->view('header');
            $this->load->view('create_plan');
            //$this->load->view('footer');
        }
        else
            $this->load->view('login');
    }
    
    public function AddNew(){
        /*if(isset($_SESSION['adminId']) && ($vendorId = $_SESSION['adminId']) != "")
        {*/
            if(preg_match("/(MP|EC|MPEC)/", $type = isset($_POST['type']) ? trim($_POST['type']) : "") == 0)
            {
                $response['err_msg'] = "Invalid Assignment Type. MP/EC/MPEC is only acceptable. Error Code #400.";
                $this->load->view('create_plan', $response);
            }

            if(preg_match("/[0-9]{1,3}/", $applicantId = isset($_POST['applicantId']) ? intval(trim($_POST['applicantId'])) : "") == 0)
            {
                $response['err_msg'] = "Invalid Applicant. Error Code: #400.";
                $this->load->view('create_plan', $response);
                /*echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Applicant ID.$applicantId", "Code" => "400")));
                exit;*/
            }
            
            if(preg_match("/[a-zA-Z0-9\-\_\.\,\s\\\]{0,50}/", $dateOfRegistration = isset($_POST['dateOfRegistration']) ? trim($_POST['dateOfRegistration']) : "") == 0)
            {
                $dateOfRegistration = NULL;
            }
            
            if(preg_match("/[a-zA-Z\s\.]{1,35}/", $rqp = isset($_POST['rqp']) ? trim($_POST['rqp']) : "") == 0)
            {
                $response['err_msg'] = "Invalid RQP Name. Error Code: #400.";
                $this->load->view('create_plan', $response);
            }
            
            if(preg_match("/[1-9][0-9\.]{1,10}/", $amount = isset($_POST['amount']) ? trim($_POST['amount']) : "") == 0)
            {
                $response['err_msg'] = "Invalid Amount. Error Code: #400.";
                $this->load->view('create_plan', $response);
            }
            
            $this->load->model('Plan_model');
            $this->load->view('create_plan', $this->Plan_model->CreatePlan($type, $applicantId, $dateOfRegistration, $rqp, $amount));
        /*}
        else
            echo json_encode(array("status" => "error", "message" => array("Title" => "Authentication Failure.", "Code" => "401")));*/
    }
    
    public function ReadAll(){
        $this->load->model('Plan_model');
        $this->load->view('view_plan', $this->Plan_model->planListing());
    }
}