<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class ApplicantController extends CI_Controller
{
    public function index()
    {
        echo "Default Controller Action For Applicant.";
    }
    
    public function AddNew(){
        /*if(isset($_SESSION['adminId']) && ($vendorId = $_SESSION['adminId']) != "")
        {*/
            if(preg_match("/^\w[a-zA-Z\s\.]{1,35}/", $name = isset($_POST['name']) ? trim($_POST['name']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Name.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/^\w[a-zA-Z0-9\s\.]{1,35}/", $businessTitle = isset($_POST['businessTitle']) ? trim($_POST['businessTitle']) : "") == 0)
            {
                $businessTitle = "";
            }

            if(preg_match("/[0-9]{10}/", $mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Mobile No $mobile.", "Code" => "400")));
                exit;
            }

            if(preg_match("/^[a-z][a-z0-9\.\_]*@[a-z][a-z0-9\.]+[a-z]$/", $email = isset($_POST['email']) ? trim($_POST['email']) : "") == 0)
            {
                $email = "";
            }
            
            if(preg_match("/[[a-zA-Z0-9\-\_\.\,\%\@\$\s\\\]{1,160}/", $addressLine = isset($_POST['addressLine']) ? trim($_POST['addressLine']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Address.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[a-zA-Z]{1,20}/", $city = isset($_POST['city']) ? trim($_POST['city']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid City Name.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[a-zA-Z]{1,20}/", $district = isset($_POST['district']) ? trim($_POST['district']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid District Name.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[a-zA-Z\s]{1,20}/", $state = isset($_POST['state']) ? trim($_POST['state']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid State Name.", "Code" => "400")));
                exit;
            }

            if(preg_match("/[0-9]{6}/", $pin = isset($_POST['PIN']) ? trim($_POST['PIN']) : "") == 0)
            {
                echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid PIN.", "Code" => "400")));
                exit;
            }
            
            if(preg_match("/[a-zA-Z0-9\-\_\.\,\s\\\]{0,50}/", $dob = isset($_POST['dob']) ? trim($_POST['dob']) : "") == 0)
            {
                $dob = NULL;
            }
            
            if(preg_match("/[a-zA-Z0-9\-\_\.\,\s\\\]{0,50}/", $ma = isset($_POST['ma']) ? trim($_POST['ma']) : "") == 0)
            {
                $ma = NULL;
            }
            
            if(preg_match("/[a-zA-Z0-9\s\S\-\_\,\.@]{1,20}/", $notes = isset($_POST['notes']) ? trim($_POST['notes']) : "") == 0)
            {
                $notes = "";
            }
            
            $this->load->model('Applicant_model');
            echo json_encode($this->Applicant_model->CreateApplicant($name, $businessTitle, $mobile, $email, $addressLine, $city, $district, $state, $pin, $dob, $ma, $notes));
        /*}
        else
            echo json_encode(array("status" => "error", "message" => array("Title" => "Authentication Failure.", "Code" => "401")));*/
    }
}