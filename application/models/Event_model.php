<?php

class Event_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('event')->result_array();
    }

    public function tambah()
    {
        $data = [
            'nama_event' => htmlspecialchars($this->input->post('nama_event')),
            'deskripsi_event' => htmlspecialchars($this->input->post('deskripsi_event')),
            'tanggal_awal' => htmlspecialchars($this->input->post('tanggal_awal')),
            'tanggal_akhir' => htmlspecialchars($this->input->post('tanggal_akhir')),
            'waktu_mulai' => htmlspecialchars($this->input->post('waktu_mulai')),
            'waktu_berakhir' => htmlspecialchars($this->input->post('waktu_berakhir')),
            'status' => NULL,
            'penyelenggara' => htmlspecialchars($this->input->post('penyelenggara')),
        ];
        // var_dump($data);
        // die;
        $this->db->insert('event', $data);
        // var_dump($this->db->last_query());
        // die;
    }
}
