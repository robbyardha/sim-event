<?php

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Peserta_model');
        $this->load->model('Scan_model');
        $this->load->model('Pendaftaran_model');
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
        $data['title'] = "Pendaftaran Event - SIM Event";
        $data['event'] = $this->Event_model->getAll();
        $data['peserta'] = $this->Peserta_model->getAlldata();
        $data['joineventpeserta'] = $this->Peserta_model->joinWithEvent();

        // var_dump($data['event']);
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/pendaftaran/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function daftarevent($id)
    {
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            [
                'required' => 'Field ini tidak boleh kosong'
            ]
        );
        $this->form_validation->set_rules(
            'asal',
            'Asal',
            'required',
            [
                'required' => 'Field ini tidak boleh kosong'
            ]
        );
        $this->form_validation->set_rules(
            'no_tlp',
            'No.Tlp',
            'required',
            [
                'required' => 'Field ini tidak boleh kosong'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Pendaftaran Event - SIM Event";
            $data['event'] = $this->Event_model->getAll();
            $data['eventid'] = $this->Event_model->getByid($id);
            $data['peserta'] = $this->Peserta_model->getAlldata();
            $data['joinhadirevent'] = $this->Scan_model->joinDataHadirWithEvent($id);

            // var_dump($data['peserta']);
            // die;

            // FOR LONG LAST QUERY
            // ini_set("xdebug.var_display_max_children", '-1');
            // ini_set("xdebug.var_display_max_data", '-1');
            // ini_set("xdebug.var_display_max_depth", '-1');
            // var_dump($this->db->last_query($data['joinhadirevent']));
            // die;
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/pendaftaran/daftarevent', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->Pendaftaran_model->daftarevent();
            $this->sendEmailSuccess('success');
            // var_dump($this->db->last_query());
            // die;
            $this->session->set_flashdata('message', 'Didaftarkan');
            redirect('pendaftaran/index');
        }
    }

    private function sendEmailSuccess($type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            // 'smtp_host' => 'ssl://smtp.gmail.com',
            // 'smtp_host' => 'ssl://smtp.googlemail.com',
            // 'smtp_host' => 'tls://smtp.googlemail.com',
            'smtp_user' => 'fottess90@gmail.com',
            'smtp_pass' => 'Fottess0090',
            // 'smtp_port' => 587,
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        // $config = [
        //     'protocol'  => 'smtp',
        //     'smtp_host' => 'ssl://mail.ardhacodes.com',
        //     'smtp_user' => 'info@ardhacodes.com',
        //     'smtp_pass' => 'Pfa}p{@y{6Gp',
        //     'smtp_port' => 465,
        //     'mailtype'  => 'html',
        //     'charset'   => 'utf-8',
        //     'newline'   => "\r\n"
        // ];
        $this->email->initialize($config);
        // $this->email->from('info@ardhacodes.com', 'Thank You For Registration');
        $this->email->from('fottess90@gmail.com', 'Thank You For Registration');
        $this->email->to($this->session->userdata('email'));
        $data = array(
            'email' => $this->input->post('email'),
        );
        $data['email'] = htmlspecialchars($this->input->post('email'));
        $data['nama_event'] = htmlspecialchars($this->input->post('nama_event'));
        $data['nama'] = htmlspecialchars($this->input->post('nama'));
        $data['asal'] = htmlspecialchars($this->input->post('asal'));
        $data['no_tlp'] = htmlspecialchars($this->input->post('no_tlp'));
        $message = $this->load->view('content/pendaftaran/email_success', $data, true);
        if ($type == 'success') {
            $this->email->subject('Thank You For Registration');
            // $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
            $this->email->message($message);
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
}
