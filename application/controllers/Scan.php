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
        $data['title'] = "Kehadiran - SIM Event";
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
        $data['event'] = $this->Event_model->getAll();
        $data['eventid'] = $this->Event_model->getByid($id);
        $data['peserta'] = $this->Peserta_model->getAlldata();
        $data['joinhadirevent'] = $this->Scan_model->joinDataHadirWithEvent();

        // var_dump($data['event']);
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/scan/kehadiran', $data);
        $this->load->view('layout/footer', $data);
    }

    public function update_hadir()
    {
        $this->Scan_model->update_hadir();
        $this->session->set_flashdata('message', 'Data telah diverifikasi Peserta Hadir');
        redirect('scan/kehadiran');
    }
}
