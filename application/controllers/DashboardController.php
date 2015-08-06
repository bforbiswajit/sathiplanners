<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

defined('BASEPATH') OR exit('Forbidden!');

class DashboardController extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
    }
    
    public function index(){
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('footer');
    }
}