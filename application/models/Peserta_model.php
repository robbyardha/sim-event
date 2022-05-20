<?php

class Peserta_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->model('Users_model');
    }
    public function getAlldata()
    {
        return $this->db->get('peserta_event')->result_array();
    }

    public function getById($id)
    {
        if ($id == NULL) {
            return $this->db->get('peserta_event')->result_array();
        } else {
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

    public function import()
    {
        // LOAD MODEL

        $CI = &get_instance();
        $CI->load->model('Event_model');
        $CI->load->model('Users_model');

        // return $CI->Event_model->getAll();
        $data['event'] = $CI->Event_model->getAll();
        $data['users'] = $CI->Users_model->getAll();

        // LOAD LIBRARY
        $this->load->library('uuid');
        $this->load->library('ciqrcode');


        // var_dump($data['users']);
        // var_dump($data['event']['nama_event']);
        // die;



        // START LOAD LIB UUID
        $uuidpeserta = $this->uuid->v4();
        $uuidpeserta = str_replace('-', '', $uuidpeserta);




        // START IMPORT
        date_default_timezone_set('Asia/Jakarta');
        $missdata = "";
        $event =

            $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if (isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['upload_file']['name']);
            $extension = end($arr_file);
            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            $data = [];
            for ($i = 1; $i < count($sheetData); $i++) {
                if ($sheetData[$i][1] == $missdata && $sheetData[$i][2] == $missdata && $sheetData[$i][3] == $missdata && $sheetData[$i][4] == $missdata && $sheetData[$i][5] == $missdata && $sheetData[$i][6] == $missdata) {
                    $this->session->set_flashdata('message', 'Data Gagal Diimport Terdapat data kosong!. Pastikan data telah valid dan terisi jika kosong gunakan NULL');
                    redirect('users');
                }
                // START LOAD LIB QR
                $nama = $sheetData[$i][1];
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
                // END LIB

                // $extractnameevent = if($data['event'] );


                /*
                //UNTUK UJI COBA

                // /DB EVENT
                $this->db->like('nama_event', $sheetData[$i][2]);
                $query = $this->db->get('event');
                $resulteventq = $query->result_array();
                // var_dump($resulteventq);
                // die;
                foreach ($resulteventq as $newev) {
                    if ($sheetData[$i][2] == $newev['nama_event']) {
                        echo "true";
                    } else {
                        echo "false";
                    }
                }

                // DB USERS
                $this->db->like('nama', $sheetData[$i][1]);
                $query = $this->db->get('users');
                $resultuserq = $query->result_array();
                foreach ($resultuserq as $newus) {
                    if ($sheetData[$i][1] == $newus['nama']) {
                        echo "true";
                    } else {
                        echo "false";
                    }
                }
                // END UJI COBA
                */

                // JOIN ALL
                // DB USERS
                $this->db->like('nama', $sheetData[$i][1]);
                $query = $this->db->get('users');
                $resultuserq = $query->result_array();
                // /DB EVENT
                $this->db->like('nama_event', $sheetData[$i][2]);
                $query = $this->db->get('event');
                $resulteventq = $query->result_array();

                foreach ($resultuserq as $newus) {
                    if ($sheetData[$i][1] == $newus['nama']) {
                        foreach ($resulteventq as $newev) {
                            if ($sheetData[$i][2] == $newev['nama_event']) {
                                $dataBuffer = [
                                    // 'id' => $sheetData[$i][0],
                                    'uuid' => $uuidpeserta++,
                                    'users_id' => $newus['id'],
                                    'event_id' => $newev['id'],
                                    'tanggal_daftar' => date("Y-m-d H:i:s"),
                                    'nama' => $sheetData[$i][1],
                                    'asal' => $sheetData[$i][3],
                                    'no_tlp' => $sheetData[$i][4],
                                    'qr_img' => $image_name,
                                ];
                            }
                        }
                    } else {
                        redirect('peserta');
                    }
                }

                // die;
                // JOIN DATA QUERY
                // $this->db->select("peserta_event.id, peserta_event.uuid, peserta_event.event_id, peserta_event.tanggal_daftar, peserta_event.nama, peserta_event.asal, peserta_event.no_tlp, peserta_event.qr_img, event.id, event.nama_event, event.deskripsi_event, event.tanggal_awal, event.tanggal_akhir, event.waktu_mulai, event.waktu_berakhir, event.penyelenggara, users.id, users.email, users.username, users.nama");
                // $this->db->from("peserta_event");
                // $this->db->join("users", "users.id = peserta_event.users_id");
                // $this->db->join("event", "event.id = peserta_event.event_id");
                // $this->db->like('nama_event', $sheetData[$i][1]);
                // $this->db->like('nama_event', $sheetData[$i][2]);
                // $this->db->get();

                // FOR LONG LAST QUERY
                // ini_set("xdebug.var_display_max_children", '-1');
                // ini_set("xdebug.var_display_max_data", '-1');
                // ini_set("xdebug.var_display_max_depth", '-1');


                // DEBUG
                // var_dump($this->db->last_query());
                // die;
                // return $result->result_array();


                // die;
                // $dataBuffer = [
                //     // 'id' => $sheetData[$i][0],
                //     'uuid' => $uuidpeserta,
                //     'users_id' => $newus['id'],
                //     'event_id' => $newev['id'],
                //     'tanggal_daftar' => date("Y-m-d H:i:s"),
                //     'nama' => $sheetData[$i][1],
                //     'asal' => $sheetData[$i][3],
                //     'no_tlp' => $sheetData[$i][4],
                //     'qr_img' => $image_name,
                // ];
                array_push($data, $dataBuffer);
            }
            // die;
            $this->db->insert_batch('peserta_event', $data);
            $this->session->set_flashdata('message', 'Data berhasil Diimport');
            redirect('peserta');
        }
    }
}
