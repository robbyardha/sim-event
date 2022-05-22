<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Users_model');
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login First </div>');
            redirect('auth');
        } elseif (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login First </div>');
            redirect('auth');
        }
        if ($this->session->userdata('role_id') != 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Kamu tidak memiliki hak akses pada modul ini</b> </div>');
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['title'] = "Users - SIM Event";
        $data['myuser'] = $this->Users_model->getSessUser();
        $data['users'] = $this->Users_model->getAll();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/users/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|is_unique[users.username]',
            [
                'required' => "Field ini harus diisi",
                'is_unique' => "Username telah digunakan",

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
            'password',
            'Password',
            'required|trim|matches[passwordconfirm]',
            [
                'required' => 'Password Wajib diisi',
                'matches' => 'Password harus sama'
            ]
        );
        $this->form_validation->set_rules(
            'passwordconfirm',
            'Confirmation Password',
            'required|trim|matches[password]',
            [
                'required' => 'Confirmation Password Wajib diisi',
                'matches' => 'Password harus sama',
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
            $data['title'] = "Users - SIM Event";
            $data['myuser'] = $this->Users_model->getSessUser();
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/users/tambah', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->Users_model->tambah();
            // var_dump($this->db->last_query());
            // die;
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('users/index');
        }
    }
    public function edit($id)
    {
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
            $data['title'] = "Users - SIM Event";
            $data['myuser'] = $this->Users_model->getSessUser();
            $data['usersid'] = $this->Users_model->getByid($id);
            // var_dump($data['event']);
            // die;
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/users/edit', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->Users_model->edit();
            // var_dump($this->db->last_query());
            // die;
            $this->session->set_flashdata('message', 'Diubah');
            redirect('users/index');
        }
    }


    public function ubahpassword($id)
    {
        $this->form_validation->set_rules(
            'newpassword',
            'New Password',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Users - SIM Event";
            $data['myuser'] = $this->Users_model->getSessUser();
            $data['usersid'] = $this->Users_model->getByid($id);
            // var_dump($data['event']);
            // die;
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/users/ubahpassword', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->Users_model->ubahpassword();
            // var_dump($this->db->last_query());
            // die;
            $this->session->set_flashdata('message', 'Diubah');
            redirect('users/index');
        }
    }

    public function hapus()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $this->Users_model->hapus($id);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('users');
    }

    public function import()
    {
        $data['title'] = "Users - SIM Event";
        $data['myuser'] = $this->Users_model->getSessUser();
        $data['users'] = $this->Users_model->getAll();
        // var_dump($data['pesertajoinevent']);
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/users/import', $data);
        $this->load->view('layout/footer', $data);
        $this->load->helper('form');
        $this->Users_model->import();
    }

    public function downloadFormat()
    {
        $this->load->helper('download');
        force_download('assets/document/format_users.xlsx', NULL);
    }
}
