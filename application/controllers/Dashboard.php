<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // var_dump($this->session->userdata());
        // die;
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
        $data['title'] = "Dashboard - SIM Event";
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/dashboard', $data);
        $this->load->view('layout/footer', $data);
    }
    public function qrexample()
    {


        $this->form_validation->set_rules(
            'event_id',
            'Event',
            'required'
        );
        $this->form_validation->set_rules(
            'users_id',
            'Event',
            'required'
        );
        $this->form_validation->set_rules(
            'status_kehadiran',
            'Event',
            'required'
        );

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "QR - SIM Event";
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/qrexample', $data);
            $this->load->view('layout/footer', $data);
        } else {


            $this->load->library('ciqrcode');
            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'event_id' => htmlspecialchars($this->input->post('event_id')),
                'users_id' => htmlspecialchars($this->input->post('users_id')),
                'status_kehadiran' => htmlspecialchars($this->input->post('status_kehadiran')),
                'waktu_kehadiran' => date('Y-m-d H:i:s')

            ];
            $event = htmlspecialchars($this->input->post('event_id'));

            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './assets/cacheqr'; //string, the default is application/cache/
            $config['errorlog']     = './assets/logqr'; //string, the default is application/logs/
            $config['imagedir']     = './assets/dataqr/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
            $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            $image_name = $event . '.png'; //buat name dari qr code sesuai dengan nim

            $params['data'] = $event; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            $this->db->insert('kehadiran_event', $data);
            // redirect('dashboard/qrexample');
        }
    }

    public function qrscan()
    {
        $data['title'] = "Dashboard - SIM Event";
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/qrscan', $data);
        $this->load->view('layout/footer', $data);
    }
}
