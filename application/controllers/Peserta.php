<?php

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Peserta_model');
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
        $data['title'] = "Peserta - SIM Event";
        $data['event'] = $this->Event_model->getAll();
        $data['peserta'] = $this->Peserta_model->getAlldata();
        $data['joineventpeserta'] = $this->Peserta_model->joinWithEvent();

        // var_dump($data['event']);
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/peserta/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules(
            'event_id',
            'Event',
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
            $data['event'] = $this->Event_model->getAll();
            $data['peserta'] = $this->Peserta_model->getAlldata();
            $data['joineventpeserta'] = $this->Peserta_model->joinWithEvent();
            $data['title'] = "Peserta - SIM Event";
            // var_dump($this->session->userdata());
            // die;
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/peserta/tambah', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->Peserta_model->tambah();
            // var_dump($this->db->last_query());
            // die;
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('peserta/index');
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules(
            'id',
            'ID',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'event_id',
            'Event',
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
            $data['title'] = "Peserta - SIM Event";
            $data['pesertaid'] = $this->Peserta_model->getById($id);
            $data['pesertajoinevent'] = $this->Peserta_model->joinWithEventId($id);

            $data['eventid'] = $this->Event_model->getByid($id);
            $data['event'] = $this->Event_model->getAll();
            // var_dump($data['pesertajoinevent']);
            // die;
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/peserta/edit', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->Peserta_model->edit();
            // var_dump($this->db->last_query());
            // die;
            $this->session->set_flashdata('message', 'Diubah');
            redirect('peserta/index');
        }
    }

    public function hapus()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $this->Peserta_model->hapus($id);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('peserta');
    }

    public function import()
    {
        $data['title'] = "Peserta - SIM Event";
        $data['event'] = $this->Event_model->getAll();
        // var_dump($data['pesertajoinevent']);
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/peserta/import', $data);
        $this->load->view('layout/footer', $data);
    }

    public function downloadFormat()
    {
        $this->load->helper('download');
        force_download('assets/file_upload/format_country.xlsx', NULL);
    }
}
