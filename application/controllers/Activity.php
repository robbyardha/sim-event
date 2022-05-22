<?php

class Activity extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Peserta_model');
        $this->load->model('Scan_model');
        $this->load->model('Pendaftaran_model');
        $this->load->model('Activity_model');
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
        $data['title'] = "Activity Event - SIM Event";
        $data['event'] = $this->Event_model->getAll();
        $data['peserta'] = $this->Peserta_model->getAlldata();
        $data['joineventpeserta'] = $this->Peserta_model->joinWithEvent();
        $data['activityjoineventpeserta'] = $this->Activity_model->joinDataPesertaWithEventUserid();
        $data['activityhadirpeserta'] = $this->Activity_model->joinDataHadirWithEventUserActivity();

        // var_dump($data['activityhadirpeserta']);
        // die;

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/activity/index', $data);
        $this->load->view('layout/footer', $data);
    }
}
