<?php

class Scan_model extends CI_Model
{
    public function joinDataHadirWithEvent($id)
    {
        $this->db->select("kehadiran_event.id, kehadiran_event.event_id, kehadiran_event.peserta_event_id, kehadiran_event.status_kehadiran, kehadiran_event.waktu_kehadiran, event.id, event.nama_event, event.deskripsi_event, event.tanggal_awal, event.tanggal_akhir, event.waktu_mulai, event.waktu_berakhir, event.penyelenggara, peserta_event.id, peserta_event.uuid, peserta_event.nama, peserta_event.asal, peserta_event.no_tlp, peserta_event.qr_img ");
        $this->db->from("kehadiran_event");
        $this->db->join("event", "event.id = kehadiran_event.event_id");
        $this->db->join("peserta_event", "peserta_event.uuid = kehadiran_event.peserta_event_id");
        $this->db->where("kehadiran_event.event_id", $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function joinDataPesertaWithEvent()
    {
        $this->db->select("event.id, event.nama_event, event.deskripsi_event, event.tanggal_awal, event.tanggal_akhir, event.waktu_mulai, event.waktu_berakhir, event.penyelenggara, peserta_event.id, peserta_event.uuid, peserta_event.nama, peserta_event.asal, peserta_event.no_tlp, peserta_event.qr_img ");
        $this->db->from("peserta_event");
        $this->db->join("event", "event.id = peserta_event.event_id");
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update_hadir()
    {
        date_default_timezone_set('Asia/Jakarta');
        $uuid = htmlspecialchars($this->input->post('qrcode'));
        $data = [
            'event_id' => htmlspecialchars($this->input->post('event_id')),
            'peserta_event_id' => $uuid,
            'status_kehadiran' => "HADIR",
            'waktu_kehadiran' => date("Y-m-d H:i:s")
        ];
        $this->db->insert('kehadiran_event', $data);
    }

    public function carikeyword($keyword)
    {
        $this->db->from('event');
        $this->db->like('nama_event', $keyword);
        $result = $this->db->get();
        return $result->result_array();
    }
}
