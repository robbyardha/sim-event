<?php

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
    }

    public function index()
    {
        $data['title'] = "Event - SIM Event";
        $data['event'] = $this->Event_model->getAll();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/event/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules(
            'nama_event',
            'Nama Event',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'deskripsi_event',
            'Deskripsi Event',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'tanggal_awal',
            'Tanggal Awal',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'tanggal_akhir',
            'Tanggal Akhir',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'waktu_mulai',
            'Waktu Mulai',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'waktu_berakhir',
            'Waktu Akhir',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'penyelenggara',
            'Penyelenggara',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Event - SIM Event";
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/event/tambah', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->Event_model->tambah();
            // var_dump($this->db->last_query());
            // die;
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('event/index');
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules(
            'nama_event',
            'Nama Event',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'deskripsi_event',
            'Deskripsi Event',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'tanggal_awal',
            'Tanggal Awal',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'tanggal_akhir',
            'Tanggal Akhir',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'waktu_mulai',
            'Waktu Mulai',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'waktu_berakhir',
            'Waktu Akhir',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        $this->form_validation->set_rules(
            'penyelenggara',
            'Penyelenggara',
            'required',
            [
                'required' => "Field ini harus diisi"
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Event - SIM Event";
            $data['event'] = $this->Event_model->getByid($id);
            // var_dump($data['event']);
            // die;
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('content/event/edit', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $this->Event_model->edit();
            // var_dump($this->db->last_query());
            // die;
            $this->session->set_flashdata('message', 'Diubah');
            redirect('event/index');
        }
    }

    public function hapus()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $this->Event_model->hapus($id);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('event');
    }
}
