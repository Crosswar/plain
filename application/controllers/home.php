<?php

class Home extends CI_Controller
{   
    function __construct() 
    {
        parent::__construct();
    }
    
    function index($start = 0)//index page
    {
        $this->load->view('header');
        $this->load->view('v_home');
        $this->load->view('footer');
    }
}