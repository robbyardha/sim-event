<?php

class Peserta_model extends CI_Model
{
    public function getAlldata()
    {
        return $this->db->get('peserta_event')->result_array();
    }

    public function getById($id)
    {
        if($id == NULL){
            return $this->db->get('peserta_event')->result_array();
        }else{
            return $this->db->get_where('peserta_event', ['id' => $id])->row_array();
        }
    }

    public function joinWithEvent()
    {
        $this->db->select("peserta_event.id, peserta_event.uuid, peserta_event.event_id, peserta_event.tanggal_daftar, peserta_event.nama, peserta_event.asal, peserta_event.no_tlp, peserta_event.qr_img, event.id, event.nama_event, event.deskripsi_event, event.tanggal_awal, event.tanggal_akhir, event.waktu_mulai, event.waktu_berakhir, event.penyelenggara");
        $this->db->from("peserta_event");
        $this->db->join("event", "event.id = peserta_event.event_id");
        $result = $this->db->get();
        return $result->result_array();
    }
    public function joinWithEventId($id)
    {
        $this->db->select("peserta_event.id, peserta_event.uuid, peserta_event.event_id, peserta_event.tanggal_daftar, peserta_event.nama, peserta_event.asal, peserta_event.no_tlp, peserta_event.qr_img, event.id, event.nama_event, event.deskripsi_event, event.tanggal_awal, event.tanggal_akhir, event.waktu_mulai, event.waktu_berakhir, event.penyelenggara");
        $this->db->from("peserta_event");
        $this->db->join("event", "event.id = peserta_event.event_id");
        $this->db->where('peserta_event.id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function tambah()
    {
        // LOAD LIBRARY
        $this->load->library('uuid');
        $this->load->library('ciqrcode');
        // ENDLOAD

        // CONFIG QR
        // DEF VARIABLE
        $nama = htmlspecialchars($this->input->post('nama'));
        $uuidpeserta = $this->uuid->v4();
        $uuidpeserta = str_replace('-', '', $uuidpeserta);

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/cacheqr'; //string, the default is application/cache/
        $config['errorlog']     = './assets/logqr'; //string, the default is application/logs/
        $config['imagedir']     = './assets/dataqr/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $image_name = $nama . '.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $uuidpeserta; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/

        // fungsi untuk generate QR CODE
        $this->ciqrcode->generate($params);

        // END CONFIG


        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'uuid' => $uuidpeserta,
            'users_id' => $this->session->userdata('user_id'),
            'event_id' => htmlspecialchars($this->input->post('event_id')),
            'tanggal_daftar' => date("Y-m-d H:i:s"),
            'nama' => htmlspecialchars($this->input->post('nama')),
            'asal' => htmlspecialchars($this->input->post('asal')),
            'no_tlp' => htmlspecialchars($this->input->post('no_tlp')),
            'qr_img' => $image_name,
        ];

        // var_dump($data);
        // die;
        $this->db->insert('peserta_event', $data);
    }

    public function edit()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $event_id = htmlspecialchars($this->input->post('event_id'));
        $nama = htmlspecialchars($this->input->post('nama'));
        $asal = htmlspecialchars($this->input->post('asal'));
        $no_tlp = htmlspecialchars($this->input->post('no_tlp'));
        $this->db->set('event_id', $event_id);
        $this->db->set('nama', $nama);
        $this->db->set('asal', $asal);
        $this->db->set('no_tlp', $no_tlp);
        $this->db->where('id', $id);
        $this->db->update('peserta_event');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('peserta_event');
    }

}
