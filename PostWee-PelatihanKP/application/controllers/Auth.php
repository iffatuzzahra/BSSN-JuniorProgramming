<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }
    public function index() {
        if (logged_in()) {
            $data['judul'] = 'My profile';
            $data['posts'] = $this->User_model->getUserPosts($_SESSION['user_id']);
            $data['comments'] = $this->User_model->getComment();
            $data_user['users'] = $this->User_model->getUsers($_SESSION['user_id']);

            $this->load->view('templates/header', $data);
            $this->load->view('auth/profile', $data_user);
            $this->load->view('post/tambah', $data_user);
            $this->load->view('post/index', $data);
            $this->load->view('templates/footer');
        } else{
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
        
            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Login Page';
                $this->load->view('auth/templates/header', $data);
                $this->load->view('auth/login');
                $this->load->view('auth/templates/footer');
            } else {
                $this->_login();
            }
        }
    }
    private function _login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->User_model->getUserByEmail($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'user_id' => $user['user_id']
                ];
                $this->session->set_userdata($data);
                redirect('post');
            } else {
                $this->session->set_flashdata('message2', '<small class=" text-danger">Password salah</small>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<small class=" text-danger">Email belum terdaftar</small>');
            redirect('auth');

        }
    }
    public function register() {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[password_confirm]', [
            'matches' => 'Password does not match!',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Register Page';
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/register');
            $this->load->view('auth/templates/footer');
        } else {
            $data = [
                'username' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'date_created' => time()
            ];

            $this->db->insert('users', $data);
            redirect('auth');
        }

    }
    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('auth');
    }
    public function updateUser($id) {
        $data['judul'] = "Update Profile";
        $data['users'] = $this->User_model->getUserById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('auth/updateprofile', $data);
        $this->load->view('templates/footer');
    }
    public function prosesUpdateUser($id) {
        $this->User_model->updateUser($id);
        redirect(base_url('auth'));
    }
    public function hapusUser($id) {
        $this->User_model->hapusUser($id);
        $this->logout();
        redirect('auth');
    }
}
