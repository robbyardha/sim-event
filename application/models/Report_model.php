<?php

class Report_model extends CI_Model
{
    public function getAsalFromPeserta()
    {
        $this->db->distinct();
        $this->db->select('asal');
        $arrPeserta = $this->db->get('peserta_event');
        return $arrPeserta->result_array();
    }
    public function getAsalFromPesertaWhereInput()
    {
        $input = $this->input->get('selectasal');
        $this->db->distinct();
        // $this->db->select('asal');
        // $this->db->where('asal', $this->input->post('selectasal'));
        // $arrPeserta = $this->db->get('peserta_event');
        // return $arrPeserta->result_array();
        $this->db->select("kehadiran_event.id, kehadiran_event.event_id, kehadiran_event.peserta_event_id, kehadiran_event.status_kehadiran, kehadiran_event.waktu_kehadiran, event.id, event.nama_event, event.deskripsi_event, event.tanggal_awal, event.tanggal_akhir, event.waktu_mulai, event.waktu_berakhir, event.penyelenggara, peserta_event.id, peserta_event.uuid, peserta_event.nama, peserta_event.asal, peserta_event.no_tlp, peserta_event.qr_img ");
        $this->db->from("kehadiran_event");
        $this->db->join("event", "event.id = kehadiran_event.event_id");
        $this->db->join("peserta_event", "peserta_event.uuid = kehadiran_event.peserta_event_id");
        $this->db->where("peserta_event.asal", $input);
        $this->db->order_by('waktu_kehadiran', 'DESC');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function pesertaAsal()
    {
        $input = $this->input->get('selectasal');
        $this->db->where('asal', $input);
        return $this->db->get('peserta_event')->result_array();
    }

    public function joinDataHadirWithEvent($id)
    {
        // $this->db->distinct();
        $this->db->select("kehadiran_event.id, kehadiran_event.event_id, kehadiran_event.peserta_event_id, kehadiran_event.status_kehadiran, kehadiran_event.waktu_kehadiran, event.id, event.nama_event, event.deskripsi_event, event.tanggal_awal, event.tanggal_akhir, event.waktu_mulai, event.waktu_berakhir, event.penyelenggara, peserta_event.id, peserta_event.uuid, peserta_event.nama, peserta_event.asal, peserta_event.no_tlp, peserta_event.qr_img ");
        $this->db->from("kehadiran_event");
        $this->db->join("event", "event.id = kehadiran_event.event_id");
        $this->db->join("peserta_event", "peserta_event.uuid = kehadiran_event.peserta_event_id");
        $this->db->where("kehadiran_event.event_id", $id);
        $this->db->order_by('waktu_kehadiran', 'DESC');
        $result = $this->db->get();
        return $result->result_array();
    }
}
