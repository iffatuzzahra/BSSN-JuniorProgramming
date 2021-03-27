<?php

class Post extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Post_model');
    }
    public function index() {
        if (logged_in()) {
            $data['judul'] = "Halaman Post";
        
            if (isset($_POST['submit'])) {
                $data['keyword'] = $this->input->post('keyword');
                $this->session->set_userdata('keyword', $data['keyword']);
            } elseif (isset($_SESSION['keyword'])) {
                $data['keyword'] = $_SESSION['keyword'];
            } else {
                $data['keyword'] = null;
            }
            
            $data['posts'] = $this->Post_model->getPosts($data['keyword']);
            $data['comments'] = $this->Post_model->getComment();
            $data_user['users'] = $this->Post_model->getUsers($_SESSION['user_id']);

            $this->load->view('templates/header', $data);
            $this->load->view('post/tambah', $data_user);
            $this->load->view('post/index', $data);
            $this->load->view('templates/footer');
        } else {
            redirect(base_url()."auth");
        }
    }
    public function prosesTambah() {
        $this->Post_model->tambahPost();
        redirect(base_url()."post");
    }
    public function prosesTambahkomentar() {
        $this->Post_model->tambahKomentar();
        redirect(base_url()."post");
    }
    public function update($id) {
        $data['judul'] = "Update Post";
        $data['posts'] = $this->Post_model->getPostById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('post/update');
        $this->load->view('templates/footer');
    }
    public function prosesUpdate($id) {
        $this->Post_model->updatePost($id);
        redirect(base_url()."post");
    }
    public function hapus($id) {
        $this->Post_model->hapusPost($id);
        redirect(base_url()."post");
    }
    public function hapusKomentar($id) {
        $this->Post_model->hapusKomentar($id);
        redirect(base_url()."post");
    }
}