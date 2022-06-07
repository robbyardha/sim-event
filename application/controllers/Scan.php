<?php

class Scan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Peserta_model');
        $this->load->model('Scan_model');
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
        $data['title'] = "Kehadiran - SIM Event";
        $data['myuser'] = $this->Users_model->getSessUser();
        $data['event'] = $this->Event_model->getAll();
        $data['peserta'] = $this->Peserta_model->getAlldata();
        $data['joineventpeserta'] = $this->Peserta_model->joinWithEvent();

        // var_dump($data['event']);
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/scan/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function kehadiran($id)
    {
        $data['title'] = "Kehadiran - SIM Event";
        $data['myuser'] = $this->Users_model->getSessUser();
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

        $this->form_validation->set_rules(
            'qrcode',
            'qrcode',
            'required',
            [
                'required' => "Field tidak boleh kosong"
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/scan/kehadiran', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $event_id = htmlspecialchars($this->input->post('event_id'));
            $this->Scan_model->update_hadir();
            $this->session->set_flashdata('message', 'Data telah diverifikasi Peserta Hadir');
            redirect('scan/kehadiran/' . $event_id);
            // base_url('scan/kehadiran/' . $event_id);
        }
    }

    public function update_hadir()
    {
        $this->Scan_model->update_hadir();
        $this->session->set_flashdata('message', 'Data telah diverifikasi Peserta Hadir');
        redirect('scan/kehadiran');
    }

    public function emergency()
    {
        $data['title'] = "Kehadiran - SIM Event";
        $data['myuser'] = $this->Users_model->getSessUser();
        $data['event'] = $this->Event_model->getAll();
        $data['peserta'] = $this->Peserta_model->getAlldata();
        $data['user'] = $this->Users_model->getAll();
        $data['joineventpeserta'] = $this->Peserta_model->joinWithEvent();

        // var_dump($data['event']);
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/emergency/index', $data);
        $this->load->view('layout/footer', $data);
    }
    public function emergencydetail($id)
    {
        $this->form_validation->set_rules(
            'event_id',
            'Event',
            'required',
            [
                'required' => 'Field ini tidak boleh kosong'
            ]
        );
        $this->form_validation->set_rules(
            'pilihpeserta',
            'Peserta',
            'required',
            [
                'required' => 'Field ini tidak boleh kosong'
            ]
        );
        $this->form_validation->set_rules(
            'uuid',
            'UUID',
            'required',
            [
                'required' => 'Field ini tidak boleh kosong'
            ]
        );
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            [
                'required' => 'Field ini tidak boleh kosong'
            ]
        );
        $this->form_validation->set_rules(
            'status',
            'Status',
            'required',
            [
                'required' => 'Field ini tidak boleh kosong'
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Kehadiran - SIM Event";
            $data['myuser'] = $this->Users_model->getSessUser();
            $data['event'] = $this->Event_model->getAll();
            $data['eventid'] = $this->Event_model->getByid($id);
            $data['peserta'] = $this->Peserta_model->getAlldata();
            // var_dump($data['peserta']);
            // die;
            $data['joinhadirevent'] = $this->Scan_model->joinDataHadirWithEvent($id);
            $data['user'] = $this->Users_model->getAll();
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/emergency/detail', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->Scan_model->hadirEmergency();
            $this->session->set_flashdata('message', 'Data Peserta Darurat Diinputkan');
            redirect('scan/emergency');
        }
    }

    public function getPesertaDetail()
    {
        // POST data
        // $postData = $this->input->post('id');
        // $postData = $this->input->post('id');
        $id = $_GET['id'];
        // $uuid = $_GET['uuid'];
        $nama = $_GET['nama'];

        $arr['id'] = $id;
        // $arr['uuid'] = $uuid;
        $arr['nama'] = $nama;

        // get data
        // $data = $this->Users_model->getUserDetail($postData);

        // var_dump(json_encode($arr));
        // die;
        echo json_encode($arr);
        // echo ($postData);
        // var_dump(json_encode($data));
    }

    public function absen()
    {
        $this->scan_model->lakukanAbsen();
        var_dump($this->db->last_query());
    }
    public function batal()
    {
        $this->scan_model->lakukanBatal();
        var_dump($this->db->last_query());
    }
}
