<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    }

    public function login_view() {
        $this->load->view('auth/login_view');
    }

    public function register_view() {
        $this->load->view('auth/register_view');
    }

    public function register_process() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // validation
            $this->form_validation->set_rules("firstname", "First Name", "trim|required|alpha");
            $this->form_validation->set_rules("lastname", "Last Name", "trim|required|alpha");
            $this->form_validation->set_rules("username", "Username", "trim|required|is_unique[users.username]");
            $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[users.email]");
            $this->form_validation->set_rules("password", "Password", "trim|required|min_length[6]");
            $this->form_validation->set_rules("cpassword", "Confirm Password", "trim|required|matches[password]|min_length[6]");
            
            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'first_name' => $this->input->post("firstname"),
                    'last_name' => $this->input->post("lastname"),
                    'username' => $this->input->post("username"),
                    'email' => $this->input->post("email"),
                    'password' => password_hash($this->input->post("password"), PASSWORD_BCRYPT),
                    'role_id' => 2, 
                ];
             
                $this->UserModel->registerUserData($data);
    
                $this->session->set_flashdata('success', 'Registration successful! You can now log in.');
                redirect('login');
            } else {
                $this->load->view('auth/register_view');
            }
        } else {
            $this->load->view('auth/register_view');
        }
    }

    public function login_process() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->form_validation->set_rules("username", "Username", "trim|required");
            $this->form_validation->set_rules("password", "Password", "trim|required");
    
            if ($this->form_validation->run() === TRUE) {
                $data = [
                    'username' => $this->input->post("username"),
                    'password' => $this->input->post("password"),
                ];
    
                $user = $this->UserModel->loginUserData($data);
    
                if ($user) {
                    // Debug output
                    var_dump($user); // Check the output to ensure role_id is set correctly
    
                    $this->session->set_userdata([
                        'logged_in' => true,
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'role_id' => $user->role_id,
                    ]);
    
                    $this->session->set_flashdata('success', 'Login Successful!');
                    if ($user->role_id === "1") {
                        redirect('admin_dashboard');
                    } else {
                        redirect('home');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Invalid email or password.');
                    redirect('login');
                }
            } else {
                $this->load->view('auth/login_view'); 
            }
        } else {
            redirect('login');
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'You have been logged out.');
        redirect('login');
    }
}
