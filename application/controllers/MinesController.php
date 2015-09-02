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
                $data['err_msg_mine'] = "Invalid Area Value. Error Code #400.";
                $data['success_msg_mine'] = "";
                $this->session->set_userdata($data);
                redirect('mines');
                
                /*echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Area Value.", "Code" => "400")));
                exit;*/
            }
            
            if(preg_match("/[a-zA-Z]{1,20}/", $leasType = isset($_POST['leasType']) ? trim($_POST['leasType']) : "") == 0)
            {
                $data['err_msg_mine'] = "Invalid Lease Type. Error Code #400.";
                $data['success_msg_mine'] = "";
                $this->session->set_userdata($data);
                redirect('mines');
            }
            
            if(preg_match("/[a-zA-Z]{1,20}/", $district = isset($_POST['district']) ? trim($_POST['district']) : "") == 0)
            {
                $data['err_msg_mine'] = "Invalid District. Error Code #400.";
                $data['success_msg_mine'] = "";
                $this->session->set_userdata($data);
                redirect('mines');
            }
            
            if(preg_match("/[a-zA-Z]{1,20}/", $mouza = isset($_POST['mouza']) ? trim($_POST['mouza']) : "") == 0)
            {
                $data['err_msg_mine'] = "Invalid Mouza. Error Code #400.";
                $data['success_msg_mine'] = "";
                $this->session->set_userdata($data);
                redirect('mines');
            }
            
            if(preg_match("/[a-zA-Z]{1,20}/", $notes = isset($_POST['notes']) ? trim($_POST['notes']) : "") == 0)
            {
                $notes = "";
            }
            
            if(preg_match("/SPPL\/(MP|EC|MPEC)\/[0-9]{1,3}/", $fileNo = isset($_POST['fileNo']) ? intval(trim($_POST['fileNo'])) : "") == 0)
            {
                $data['err_msg_mine'] = "Invalid File No (Example - SPPL/MPEC/15). Error Code #400.";
                $data['success_msg_mine'] = "";
                $this->session->set_userdata($data);
                redirect('mines');
            }
            
            if(preg_match("/[0-9]{1,2}/", $degLat = isset($_POST['degLat']) ? intval(trim($_POST['degLat'])) : "") == 0)
            {
                $degLat = "";
            }
            
            if(preg_match("/[0-9]{1,2}/", $minLat = isset($_POST['minLat']) ? intval(trim($_POST['minLat'])) : "") == 0)
            {
                $minLat = "";
            }
            
            if(preg_match("/[0-9]{1,2}/", $secLat = isset($_POST['secLat']) ? intval(trim($_POST['secLat'])) : "") == 0)
            {
                $secLat = "";
            }
            
            if(preg_match("/[0-9]{1,2}/", $degLng = isset($_POST['degLng']) ? intval(trim($_POST['degLng'])) : "") == 0)
            {
                $degLng = "";
            }
            
            if(preg_match("/[0-9]{1,2}/", $minLng = isset($_POST['minLng']) ? intval(trim($_POST['minLng'])) : "") == 0)
            {
                $minLng = "";
            }
            
            if(preg_match("/[0-9]{1,2}/", $secLng = isset($_POST['secLng']) ? intval(trim($_POST['secLng'])) : "") == 0)
            {
                $secLng = "";
            }
            
            if(preg_match("/(N|S)/", $hemiLat = isset($_POST['hemiLat']) ? intval(trim($_POST['hemiLat'])) : "") == 0)
            {
                $hemiLat = "";
            }
            
            if(preg_match("/(E|W)/", $hemiLng = isset($_POST['hemiLng']) ? intval(trim($_POST['hemiLng'])) : "") == 0)
            {
                $hemiLng = "";
            }
            
            if($degLat != "" && $minLat != "" && $secLat != "" && $degLng != "" && $minLng != "" && $secLng != "" && $hemiLat != "" && $hemiLng != ""){
                $coOrdinate = $degLat . "#" . $minLat . "#" . $secLat . $hemiLat . $degLng . "#" . $minLng . "#" . $secLng . $hemiLng;
            }
            else
                $coOrdinate = "";
            
            $this->load->model('Mines_model');
            $this->Mines_model->CreateMines($area,$leasType, $district, $mouza, $notes, $fileNo, $coOrdinate);
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