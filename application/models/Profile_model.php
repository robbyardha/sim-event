<?php

class Profile_model extends CI_Model
{
    public function getUserId()
    {
        $user_id = $this->session->userdata('user_id');
        return $this->db->get_where('users', ['id' => $user_id])->row_array();
        var_dump($this->db->last_query());
        die;
    }

    public function changeprofile()
    {
        $user_id = htmlspecialchars($this->input->post('user_id'));
        $username = htmlspecialchars($this->input->post('username'));
        $email = htmlspecialchars($this->input->post('email'));
        $nama = htmlspecialchars($this->input->post('nama'));
        $asal = htmlspecialchars($this->input->post('asal'));
        $no_tlp = htmlspecialchars($this->input->post('no_tlp'));

        //cek image
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $config['max_size']  = 2048;
            $config['upload_path']  = './assets/images/avatars/';
            $new_name = time() . $_FILES["userfiles"]['name'] . $this->session->userdata('username');
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                // $data = $this->upload->data();
                // $image = $data['file_name'];
                $newimage = $this->upload->data('file_name');
                $this->db->set('image', $newimage);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->set('username', $username);
        $this->db->set('email', $email);
        $this->db->set('nama', $nama);
        $this->db->set('asal', $asal);
        $this->db->set('no_tlp', $no_tlp);
        $this->db->where('id', $user_id);
        $this->db->update('users');
    }

    public function changepassword()
    {
        $data['current_user'] = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row_array();
        $oldpass = $this->input->post('oldpassword');
        $newpass = $this->input->post('newpass');
        if (!password_verify($oldpass, $data['current_user']['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong> Password Lama Tidak Sesuai </strong> </div>');
            redirect('profile/changepassword');
        } else {
            if ($oldpass == $newpass) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong> Password tidak sama </strong> </div>');
                redirect('profile/changepassword');
            } else {
                $password_hash = password_hash($newpass, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('id', $this->session->userdata('user_id'));
                $this->db->update('users');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><strong> Password berhasil dirubah </strong> </div>');
                redirect('profile/changepassword');
            }
        }
    }
}
