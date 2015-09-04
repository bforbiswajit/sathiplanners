<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class ApplicantController extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
    }
        
    public function index()
    {
        //$this->load->view('header');
        $this->load->view('add_applicant');
        //$this->load->view('footer');
        //echo "Default Controller Action For Applicant.";
    }
    
    public function AddNew(){
        /*if(isset($_SESSION['adminId']) && ($vendorId = $_SESSION['adminId']) != "")
        {*/
            if(preg_match("/^\w[a-zA-Z\s\.]{1,35}/", $name = isset($_POST['name']) ? trim($_POST['name']) : "") == 0)
            {
                $data = $this->session->userdata();
                $data['err_msg_applicant'] = "Invalid Name. Max 35 Characters, No Special Character Allowed. Error Code #400.";
                $data['success_msg_applicant'] = "";
                $this->session->set_userdata($data);
                redirect('applicant');
                /*echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Name.", "Code" => "400")));
                exit;*/
            }
            
            if(preg_match("/^\w[a-zA-Z0-9\s\.]{1,35}/", $businessTitle = isset($_POST['businessTitle']) ? trim($_POST['businessTitle']) : "") == 0)
            {
                $businessTitle = "";
            }

            if(preg_match("/[0-9]{10}/", $mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : "") == 0)
            {
                $data = $this->session->userdata();
                $data['err_msg_applicant'] = "Invalid Mobile No (Insert Only 10 Digits). Error Code #400.";
                $data['success_msg_applicant'] = "";
                $this->session->set_userdata($data);
                redirect('applicant');
            }

            if(preg_match("/^[a-z][a-z0-9\.\_]*@[a-z][a-z0-9\.]+[a-z]$/", $email = isset($_POST['email']) ? trim($_POST['email']) : "") == 0)
            {
                $email = "";
            }
            
            if(preg_match("/[a-zA-Z\s\:\.\/\\\-]{1,160}/", $addressLine = isset($_POST['addressLine']) ? trim($_POST['addressLine']) : "") == 0)
            {
                $data = $this->session->userdata();
                $data['err_msg_applicant'] = "Invalid Address.  Max 160 Characters. Error Code #400.";
                $data['success_msg_applicant'] = "";
                $this->session->set_userdata($data);
                redirect('applicant');
            }
            
            if(preg_match("/[a-zA-Z\s\.]{1,20}/", $city = isset($_POST['city']) ? trim($_POST['city']) : "") == 0)
            {
                $data = $this->session->userdata();
                $data['err_msg_applicant'] = "Invalid City. Max 20 Characters, No Special Character/Digit Allowed. Error Code #400.";
                $data['success_msg_applicant'] = "";
                redirect('applicant');
            }
            
            if(preg_match("/[a-zA-Z\s\.]{1,20}/", $district = isset($_POST['district']) ? trim($_POST['district']) : "") == 0)
            {
                $data = $this->session->userdata();
                $data['err_msg_applicant'] = "Invalid District. Max 20 Characters, No Special Character/Digit Allowed. Error Code #400.";
                $data['success_msg_applicant'] = "";
                $this->session->set_userdata($data);
                redirect('applicant');
            }
            
            if(preg_match("/[a-zA-Z\s\.]{1,20}/", $state = isset($_POST['state']) ? trim($_POST['state']) : "") == 0)
            {
                $data = $this->session->userdata();
                $data['err_msg_applicant'] = "Invalid State. Max 20 Characters, No Special Character/Digit Allowed. Error Code #400.";
                $data['success_msg_applicant'] = "";
                $this->session->set_userdata($data);
                redirect('applicant');
            }

            if(preg_match("/[0-9]{6}/", $pin = isset($_POST['PIN']) ? trim($_POST['PIN']) : "") == 0)
            {
                $data = $this->session->userdata();
                $data['err_msg_applicant'] = "Invalid P.I.N. Error Code #400.";
                $data['success_msg_applicant'] = "";
                $this->session->set_userdata($data);
                redirect('applicant');
            }
            
            if(preg_match("/\d\d\/\d\d\/\d\d\d\d/", $dob = isset($_POST['dob']) ? trim($_POST['dob']) : "") == 0)
            {
                $dob = NULL;
            }
            
            if(preg_match("/\d\d\/\d\d\/\d\d\d\d/", $ma = isset($_POST['ma']) ? trim($_POST['ma']) : "") == 0)
            {
                $ma = NULL;
            }
            
            if(preg_match("/[a-zA-Z0-9\s\S\-\_\,\.@]{1,20}/", $notes = isset($_POST['notes']) ? trim($_POST['notes']) : "") == 0)
            {
                $notes = NULL;
            }
            
            $this->load->model('Applicant_model');
            $this->Applicant_model->CreateApplicant($name, $businessTitle, $mobile, $email, $addressLine, $city, $district, $state, $pin, $dob, $ma, $notes);
            $this->load->view('add_applicant');
        /*}
        else
            echo json_encode(array("status" => "error", "message" => array("Title" => "Authentication Failure.", "Code" => "401")));*/
    }
    
    public function Edit(){
        if(preg_match("/[0-9]{1,3}/", $applicantId = isset($_POST['applicantId']) ? intval(trim($_POST['applicantId'])) : "") == 0){
            $data = $this->session->userdata();
            $data['err_msg_applicant'] = "Invalid Applicant ID $applicantId. Error Code #400.";
            $data['success_msg_applicant'] = "";
            $this->session->set_userdata($data);
            redirect('applicant');
        }
        
        if(preg_match("/^\w[a-zA-Z\s\.]{1,35}/", $name = isset($_POST['name']) ? trim($_POST['name']) : "") != 0)
        {
            $updateFields["name"] = $name;
        }

        if(preg_match("/^\w[a-zA-Z0-9\s\.]{1,35}/", $businessTitle = isset($_POST['businessTitle']) ? trim($_POST['businessTitle']) : "") != 0)
        {
            $updateFields["businessTitle"] = $businessTitle;
        }

        if(preg_match("/[0-9]{10}/", $mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : "") != 0)
        {
            $updateFields["mobile"] = $mobile;
        }

        if(preg_match("/^[a-z][a-z0-9\.\_]*@[a-z][a-z0-9\.]+[a-z]$/", $email = isset($_POST['email']) ? trim($_POST['email']) : "") != 0)
        {
            $updateFields["email"] = $email;
        }

        if(preg_match("/[a-zA-Z\s\:\.\/\\\-]{1,160}/", $addressLine = isset($_POST['addressLine']) ? trim($_POST['addressLine']) : "") != 0)
        {
            $updateFields["addressLine"] = $addressLine;
        }

        if(preg_match("/[a-zA-Z\s\.]{1,20}/", $city = isset($_POST['city']) ? trim($_POST['city']) : "") != 0)
        {
            $updateFields["city"] = $city;
        }

        if(preg_match("/[a-zA-Z\s\.]{1,20}/", $district = isset($_POST['district']) ? trim($_POST['district']) : "") != 0)
        {
            $updateFields["district"] = $district;
        }

        if(preg_match("/[a-zA-Z\s\.]{1,20}/", $state = isset($_POST['state']) ? trim($_POST['state']) : "") != 0)
        {
            $updateFields["state"] = $state;
        }

        if(preg_match("/[0-9]{6}/", $pin = isset($_POST['PIN']) ? trim($_POST['PIN']) : "") != 0)
        {
            $updateFields["pin"] = $pin;
        }

        if(preg_match("/\d\d\/\d\d\/\d\d\d\d/", $dob = isset($_POST['dob']) ? trim($_POST['dob']) : "") != 0)
        {
            $updateFields["dob"] = $dob;
        }

        if(preg_match("/\d\d\/\d\d\/\d\d\d\d/", $ma = isset($_POST['ma']) ? trim($_POST['ma']) : "") != 0)
        {
            $updateFields["ma"] = $ma;
        }

        if(is_array($updateFields) && count($updateFields) > 0)
        {
            $this->load->model('Applicant_model');
            $this->Applicant_model->UpdateApplicant($updateFields, $applicantId);
        }
        
        redirect('applicant/getall');
    }
    
    public function GetApplicant(){
        if(preg_match("/[a-zA-Z0-9\s\.]{1,15}/", $key = isset($_POST['applicantId']) ? trim($_POST['applicantId']) : "") == 0)
        {
            $data = $this->session->userdata();
            $data['err_msg_applicant'] = "Invalid Search Query. Error Code #400.";
            $data['success_msg_applicant'] = "";
            $this->session->set_userdata($data);
            redirect('applicant');
        }
        
        $this->load->model('Applicant_model');
        echo $this->Applicant_model->ReadPartialApplicant($key);
    }
    
    public function ReadAll(){
        $this->load->model('Applicant_model');
        $this->load->view('view_applicant', $this->Applicant_model->applicantListing());
    }
    
    public function ReadOne(){
        if(preg_match("/[a-zA-Z0-9\s\.]{1,15}/", $applicantId = isset($_POST['applicantId']) ? trim($_POST['applicantId']) : "") == 0)
        {
            $data = $this->session->userdata();
            $data['err_msg_applicant'] = "Invalid Search Query.. Error Code #400.";
            $data['success_msg_applicant'] = "";
            $this->session->set_userdata($data);
            redirect('applicant');
        }
        $this->load->model('Applicant_model');
        $this->load->view('view_applicant', $this->Applicant_model->ReadApplicant($applicantId));
    }
}