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

    public function forgotpass()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email'
        );

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Forgot Password - SIM Event";
            $this->load->view('layout/header', $data);
            $this->load->view('auth/forgotpass', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $email = $this->input->post('email');
            $akun = $this->db->get_where('users', ['email' => $email, 'is_active' => 1])->row_array();

            if ($akun) {
                $token = base64_encode(random_bytes(32));
                $akun_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('akun_token', $akun_token);
                $this->sendEmail($token, 'forgot');

                $this->session->set_flashdata('fp', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('auth/forgotpass');
            } else {
                $this->session->set_flashdata('fp', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                redirect('auth/forgotpass');
            }
        }
    }

    private function sendEmail($token, $type)
    {
        // $config = [
        //     'protocol'  => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_user' => 'fottess90@gmail.com',
        //     'smtp_pass' => 'Fottess0090',
        //     'smtp_port' => 465,
        //     'mailtype'  => 'html',
        //     'charset'   => 'utf-8',
        //     'newline'   => "\r\n"
        // ];

        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://mail.ardhacodes.com',
            'smtp_user' => 'info@ardhacodes.com',
            'smtp_pass' => 'Pfa}p{@y{6Gp',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);
        // $data['filename'] = '/assets/images/logo/unair.png';
        // $this->email->attach($data['filename']);

        // $this->email->from('fottess90@gmail.com', 'Reset Password');
        $this->email->from('info@ardhacodes.com', 'Reset Password');
        $this->email->to($this->input->post('email'));
        $data = array(
            'email' => $this->input->post('email'),
        );
        $data['email'] = htmlspecialchars($this->input->post('email'));
        $data['token'] = $token;
        $message = $this->load->view('auth/email_reset_password', $data, true);
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message($message);
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('akun_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required|min_length[3]|matches[confirmpassword]');
        $this->form_validation->set_rules('confirmpassword', 'Repeat Password', 'trim|required|min_length[3]|matches[newpassword]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Forgot Password - SIM Event";
            $this->load->view('layout/header', $data);
            $this->load->view('auth/changeresetpass', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $password = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('akun_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
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
