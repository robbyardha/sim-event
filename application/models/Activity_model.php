<?php

class Activity_model extends CI_Model
{
    public function joinDataPesertaWithEventUserid()
    {
        $users_id = $this->session->userdata('user_id');
        $this->db->select("event.id, event.nama_event, event.deskripsi_event, event.tanggal_awal, event.tanggal_akhir, event.waktu_mulai, event.waktu_berakhir, event.penyelenggara, peserta_event.id, peserta_event.uuid, peserta_event.nama, peserta_event.asal, peserta_event.no_tlp, peserta_event.qr_img ");
        $this->db->from("peserta_event");
        $this->db->join("event", "event.id = peserta_event.event_id");
        $this->db->where("peserta_event.users_id", $users_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function joinDataHadirWithEventUserActivity()
    {
        $users_id = $this->session->userdata('user_id');
        $this->db->select("kehadiran_event.id, kehadiran_event.event_id, kehadiran_event.peserta_event_id, kehadiran_event.status_kehadiran, kehadiran_event.waktu_kehadiran, event.id, event.nama_event, event.deskripsi_event, event.tanggal_awal, event.tanggal_akhir, event.waktu_mulai, event.waktu_berakhir, event.penyelenggara, peserta_event.id, peserta_event.uuid, peserta_event.nama, peserta_event.asal, peserta_event.no_tlp, peserta_event.qr_img ");
        $this->db->from("kehadiran_event");
        $this->db->join("event", "event.id = kehadiran_event.event_id");
        $this->db->join("peserta_event", "peserta_event.uuid = kehadiran_event.peserta_event_id");
        $this->db->where("peserta_event.users_id", $users_id);
        $result = $this->db->get();
        return $result->result_array();
    }
}
