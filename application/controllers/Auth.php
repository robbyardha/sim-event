<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'username',
            'username',
            'required',
            [
                'required' => 'Email/Username Wajib diisi',
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Wajib diisi'
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Sign In - SIM Event";
            $this->load->view('layout/header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->login();
        }
    }

    public function registrasi()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email',
            [
                'required' => 'Email Wajib diisi',
                'valid_email' => 'Input Harus berupa email'
            ]
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[users.username]',
            [
                'required' => 'Username Wajib diisi',
                'is_unique' => "Username telah terdaftar",
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|matches[confirmpassword]',
            [
                'required' => 'Password Wajib diisi',
                'matches' => 'Password harus sama'
            ]
        );
        $this->form_validation->set_rules(
            'confirmpassword',
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
            'required|trim',
            [
                'required' => 'Nama Wajib diisi',
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Sign Up - SIM Event";
            $this->load->view('layout/header', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'email' => htmlspecialchars($this->input->post('email', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => htmlspecialchars($this->input->post('nama')),
                'role_id' => 1,
                'is_active' => 1,
                'created_date' => date('Y-m-d H:i:s'),
                'image' => NULL
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil ditambah </div>');
            redirect('auth');
            // var_dump($data);
            // die;
        }
    }

    private function login()
    {
        $email = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        $username = $this->db->get_where('users', ['username' => $email])->row_array();

        //user ada
        if ($user) {
            //is_active
            if ($user['is_active'] == 1) {

                //password verify
                if (password_verify($password, $user['password'])) {
                    // $data = $user;
                    unset($user['password']);
                    $data = [
                        'email' => $user['email'],
                        'username' => $user['username'],
                        'nama' => $user['nama'],
                        'role_id' => $user['role_id'],
                        'user_id' => $user['id']
                    ];
                    unset($user['id']);
                    // $data = $user;
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    email/Password salah </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                email Belum aktif, hubungi Admin! </div>');
                redirect('auth');
            }
        } else if ($username) {
            if ($username['is_active'] == 1) {

                //password verify
                if (password_verify($password, $username['password'])) {
                    // $data = $user;
                    unset($username['password']);
                    $data = [
                        'email' => $username['email'],
                        'username' => $username['username'],
                        'nama' => $username['nama'],
                        'role_id' => $username['role_id'],
                        'user_id' => $username['id']
                    ];
                    // $username['user_id'] = $username['id'];
                    // $username['user_id'] = $username['nama'];
                    // $username['user_id'] = $username['image'];
                    // unset($username['id']);
                    // $data = $username;
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    email/Username/Password salah </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                username Belum aktif, hubungi Admin! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            email/username tidak ada </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('role_id');
        $this->session->all_userdata();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Kamu berhasil logout </div>');
        redirect('auth');
    }
}
