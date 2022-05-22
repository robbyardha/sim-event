<?php

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Peserta_model');
        $this->load->model('Profile_model');
        $this->load->model('Users_model');
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login First </div>');
            redirect('auth');
        } elseif (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login First </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required',
            [
                'required' => "Field ini harus diisi",

            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'asal',
            'Asal',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'no_tlp',
            'No Tlp',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Profile - SIM Event";
            $data['myuser'] = $this->Users_model->getSessUser();
            $data['event'] = $this->Event_model->getAll();
            $data['peserta'] = $this->Peserta_model->getAlldata();
            $data['joineventpeserta'] = $this->Peserta_model->joinWithEvent();
            $data['user'] = $this->Profile_model->getUserId();
            // $data['user'] = $this->session->userdata();

            // var_dump($data['user']);
            // die;
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/profile/changeprofile', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->Profile_model->changeprofile();
            $this->session->set_flashdata('message', "Diupdate");
            redirect('profile');
        }
    }

    public function changepassword()
    {
        $data['current_user'] = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row_array();
        // var_dump($data['current_user']);
        // die;
        $this->form_validation->set_rules(
            'oldpassword',
            'Old Password',
            'required',
            [
                'required' => "Field ini harus diisi",

            ]
        );
        $this->form_validation->set_rules(
            'newpass',
            'New Password',
            'required|trim|min_length[6]|matches[confirmpass]',
            [
                'required' => 'Password baru Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'confirmpass',
            'Confirmation Password',
            'required|trim|min_length[6]|matches[newpass]',
            [
                'required' => 'Password baru Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Profile - SIM Event";
            $data['myuser'] = $this->Users_model->getSessUser();
            $data['event'] = $this->Event_model->getAll();
            $data['peserta'] = $this->Peserta_model->getAlldata();
            $data['joineventpeserta'] = $this->Peserta_model->joinWithEvent();
            $data['user'] = $this->Profile_model->getUserId();
            // $data['user'] = $this->session->userdata();

            // var_dump($data['user']);
            // die;
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/profile/changepassword', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->Profile_model->changepassword();
            $this->session->set_flashdata('message', "Password Berhasil Diupdate");
            redirect('profile');
        }
    }
}
