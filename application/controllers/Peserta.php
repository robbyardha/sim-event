<?php

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Peserta_model');
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
        $data['title'] = "Peserta - SIM Event";
        $data['myuser'] = $this->Users_model->getSessUser();
        $data['event'] = $this->Event_model->getAll();
        $data['peserta'] = $this->Peserta_model->getAlldata();
        $data['joineventpeserta'] = $this->Peserta_model->joinWithEvent();
        $data['allusers'] = $this->Users_model->joinUserwithPeserta();

        // var_dump($data['allusers']);
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
            $data['title'] = "Peserta - SIM Event";
            $data['myuser'] = $this->Users_model->getSessUser();
            $data['event'] = $this->Event_model->getAll();
            $data['peserta'] = $this->Peserta_model->getAlldata();
            $data['user'] = $this->Users_model->getAll();
            $data['joineventpeserta'] = $this->Peserta_model->joinWithEvent();
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
            $data['myuser'] = $this->Users_model->getSessUser();
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
        $data['myuser'] = $this->Users_model->getSessUser();
        $data['event'] = $this->Event_model->getAll();
        // var_dump($data['pesertajoinevent']);
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/peserta/import', $data);
        $this->load->view('layout/footer', $data);
        $this->load->helper('form');
        $this->Peserta_model->import();
    }

    public function downloadFormat()
    {
        $this->load->helper('download');
        force_download('assets/document/format_peserta.xlsx', NULL);
    }

    public function getUsersDetail()
    {
        // POST data
        // $postData = $this->input->post('id');
        // $postData = $this->input->post('id');
        $id = $_GET['id'];
        $nama = $_GET['nama'];

        $arr['id'] = $id;
        $arr['nama'] = $nama;

        // get data
        // $data = $this->Users_model->getUserDetail($postData);

        // var_dump(json_encode($arr));
        // die;
        echo json_encode($arr);
        // echo ($postData);
        // var_dump(json_encode($data));
    }
}
