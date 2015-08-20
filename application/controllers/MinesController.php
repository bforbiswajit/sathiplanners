<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class MinesController extends CI_Controller
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
            $this->load->view('add_mine');
            //$this->load->view('footer');
        }
        else
            redirect('login');
    }
    
    public function AddNew(){
        /*if(isset($_SESSION['adminId']) && ($vendorId = $_SESSION['adminId']) != "")
        {*/
            if(preg_match("/[0-9\.]{1,5}/", $area = isset($_POST['area']) ? trim($_POST['area']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Area Value.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[a-zA-Z]{1,20}/", $leasType = isset($_POST['leasType']) ? trim($_POST['leasType']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Leas Type.", "Code" => "400")));
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
            $this->Mines_model->CreateMines($area,$leasType, $district, $mouza, $notes, $fileNo);
            $this->load->view('add_mine');
        /*}
        else
            echo json_encode(array("status" => "error", "message" => array("Title" => "Authentication Failure.", "Code" => "401")));*/
    }
    
    public function ReadAll(){
        $this->load->model('Mines_model');
        $this->load->view('view_mines', $this->Mines_model->minesListing());
    }
}