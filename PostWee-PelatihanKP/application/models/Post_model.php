<?php

class Post_model extends CI_Model {
    public function tambahPost() {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'post_item' => $this->input->post('isi'),
            'user_id' => $this->input->post('user_id'),
            'date_created' => date("Y-m-d H:i:s")
        );
        $this->db->insert('posts', $data);
    }
    public function tambahKomentar() {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'comment_item' => $this->input->post('komentar'),
            'post_id' => $this->input->post('post_id'),
            'user_id' => $this->input->post('user_id'),
            'date_created' => date("Y-m-d H:i:s")
        );
        $this->db->insert('comments', $data);
    }
    public function getPosts($keyword) {
        return $this->db
            ->select("*")
            ->from('posts')
            ->join('users', 'posts.user_id = users.user_id', 'left')
            ->like('username', $keyword)
            ->order_by('post_id', 'DESC')
            ->get()
            ->result_array();
    }
    public function getComment()  {
        return $this->db
            ->select('*')
            ->from('comments')
            ->join('users', 'comments.user_id = users.user_id', 'left')
            ->order_by('comment_id', 'ASC')
            ->get()
            ->result_array();
    }
    public function getUsers($id)  {
        return $this->db
            ->select('*')
            ->get_where('users', ['user_id' => $id])
            ->result_array();
    }
    public function getPostById($id) {
        return $this->db
            ->select("post_id, post_item")
            ->where('post_id', $id)
            ->get('posts')
            ->result_array();
    }
    public function updatePost($id) {
        $data= array(
            'post_item' => $this->input->post('post_item')
        );
        $this->db
            ->where('post_id', $id)
            ->update('posts', $data);
    }
    public function hapusPost($id) {
        $this->db
            ->where('post_id', $id)
            ->delete('posts');
    }
    public function hapusKomentar($id) {
        $this->db
            ->where('comment_id', $id)
            ->delete('comments');
    }
}