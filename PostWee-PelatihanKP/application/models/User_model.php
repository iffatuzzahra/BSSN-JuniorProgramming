<?php

class User_model extends CI_Model {
    
    public function getUserByEmail($email) {
        return $this->db
            ->get_where('users', ['email' => $email])
            ->row_array();
    }
    public function getUserById($id) {
        return $this->db
            ->select("*")
            ->where('user_id', $id)
            ->get('users')
            ->result_array();
    }
    public function getUserPosts($id) {
        return $this->db
            ->select("*")
            ->from('posts')
            ->join('users', 'posts.user_id = users.user_id', 'left')
            ->where('users.user_id', $id)
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
    public function updateUser($id) {
        $data= array(
            'username' => $this->input->post('username')
        );
        $this->db
            ->where('user_id', $id)
            ->update('users', $data);
    }
    public function hapusUser($id) {
        $this->db
            ->where('user_id', $id)
            ->delete('users');
    }

}