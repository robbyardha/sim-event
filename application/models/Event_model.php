<?php

class Event_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('event')->result_array();
    }

    public function getByid($id)
    {
        if ($id == NULL) {
            return $this->db->get('event')->result_array();
        } else {
            return $this->db->get_where('event', ['id' => $id])->row_array();
        }
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
            'penyelenggara' => htmlspecialchars($this->input->post('penyelenggara')),
        ];
        // var_dump($data);
        // die;
        $this->db->insert('event', $data);
        // var_dump($this->db->last_query());
        // die;
    }

    public function edit()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $nama_event = htmlspecialchars($this->input->post('nama_event'));
        $deskripsi_event = htmlspecialchars($this->input->post('deskripsi_event'));
        $tanggal_awal = htmlspecialchars($this->input->post('tanggal_awal'));
        $tanggal_akhir = htmlspecialchars($this->input->post('tanggal_akhir'));
        $waktu_mulai = htmlspecialchars($this->input->post('waktu_mulai'));
        $waktu_berakhir = htmlspecialchars($this->input->post('waktu_berakhir'));
        $penyelenggara = htmlspecialchars($this->input->post('penyelenggara'));
        $this->db->set('nama_event', $nama_event);
        $this->db->set('deskripsi_event', $deskripsi_event);
        $this->db->set('tanggal_awal', $tanggal_awal);
        $this->db->set('tanggal_akhir', $tanggal_akhir);
        $this->db->set('waktu_mulai', $waktu_mulai);
        $this->db->set('waktu_berakhir', $waktu_berakhir);
        $this->db->set('penyelenggara', $penyelenggara);
        $this->db->where('id', $id);
        $this->db->update('event');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('event');
    }

    public function countEvent()
    {
        return $this->db->get('event')->num_rows();
    }
}
