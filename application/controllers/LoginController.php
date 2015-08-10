<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class LoginController extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
    }
    
    public function index(){
        if($this->session->userdata('userId'))
            redirect('dashboard');
        else
            $this->load->view('login');
    }
    
    public function Login(){
        if(preg_match("/^[a-z][a-z0-9\.\_]*@[a-z][a-z0-9\.]+[a-z]$/", $email = isset($_POST['email']) ? trim($_POST['email']) : "") == 0)
        {
            $response['err_msg'] = "Please enter a valid email.";
            $this->load->view('login', $response);
        }
        
        if(preg_match("/[a-zA-Z0-9\'\"\s\.\,\-\+\/\\\]{4,160}/", $password = isset($_POST['password']) ? trim($_POST['password']) : "") == 0)
        {
            echo json_encode(array("status" => "error", "message" => array("Title" => "Invalid Password.", "Code" => "400")));
            exit;
        }
        
        $this->load->model('Login_model');
        if($this->Login_model->Login($email, $password))
            redirect('dashboard');
        else
        {
            /*$response['err_msg'] = "Sorry, User/Password Mismatch.";
            $this->load->view('login', $response);*/
            redirect('login');
        }
    }
    
    public function Logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
    
    public function CheckSession(){
        echo "<pre>";
        print_r($this->session->all_userdata());
    }
}