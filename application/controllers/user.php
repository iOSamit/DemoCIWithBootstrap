<?php
class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->model('userModel');
    }
    
    function index()
    {
        $this->login();
    }

    function register()
    {
        //set validation rules
        $this->form_validation->set_rules('userName', 'User Name', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('userEmail', 'Email ID', 'trim|required|valid_email|is_unique[users.userEmail]');
        $this->form_validation->set_rules('userPassword', 'Password', 'trim|required|matches[cpassword]|md5');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('registerView');
        }
        else
        {
            //insert the user registration details into database
            $data = array(
                'userName' => $this->input->post('userName'),
                'userEmail' => $this->input->post('userEmail'),
                'userPassword' => $this->input->post('userPassword')
            );
            
            // insert form data into database
            if ($this->userModel->insertUser($data))
            {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
                    redirect('user/register');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('user/register');
            }
        }
    }
    
    public function login()
     {
          //get the posted values
          $username = $this->input->post("txt_username");
          $password = $this->input->post("txt_password");

          //set validations
          $this->form_validation->set_rules("txt_username", "Username", "trim|required");
          $this->form_validation->set_rules("txt_password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('loginView');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->loginModel->getUser($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
                         //set the session variables
                         $sessiondata = array(
                              'username' => $username,
                              'loginuser' => TRUE
                         );
                         $this->session->set_userdata($sessiondata);
                         redirect("index");
                    }
                    else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         redirect('login/index');
                    }
               }
               else
               {
                    redirect('login/index');
               }
          }
     }
}
?>





<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 

