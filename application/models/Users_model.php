<?php

class Users_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('users')->result_array();
    }

    public function getByid($id)
    {
        if ($id == NULL) {
            return $this->db->get('users')->result_array();
        } else {
            return $this->db->get_where('users', ['id' => $id])->row_array();
        }
    }

    public function getSessUser()
    {
        return $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row_array();
    }

    public function tambah()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama' => htmlspecialchars($this->input->post('nama')),
            'asal' => htmlspecialchars($this->input->post('asal')),
            'no_tlp' => htmlspecialchars($this->input->post('no_tlp')),
            'role_id' => 2,
            'is_active' => 1,
            'created_date' => date('Y-m-d H:i:s'),
            'image' => NULL
        ];
        // var_dump($data);
        // die;
        $this->db->insert('users', $data);
        // var_dump($this->db->last_query());
        // die;
    }

    public function edit()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $email = htmlspecialchars($this->input->post('email'));
        $username = htmlspecialchars($this->input->post('username'));
        $nama = htmlspecialchars($this->input->post('nama'));
        $asal = htmlspecialchars($this->input->post('asal'));
        $no_tlp = htmlspecialchars($this->input->post('no_tlp'));
        $this->db->set('email', $email);
        $this->db->set('username', $username);
        $this->db->set('nama', $nama);
        $this->db->set('asal', $asal);
        $this->db->set('no_tlp', $no_tlp);
        $this->db->where('id', $id);
        $this->db->update('users');
    }

    public function ubahpassword()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $newpassword = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
        $this->db->set('password', $newpassword);
        $this->db->where('id', $id);
        $this->db->update('users');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    public function import()
    {
        date_default_timezone_set('Asia/Jakarta');
        $missdata = "";
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
                $dataBuffer = [
                    // 'id' => $sheetData[$i][0],
                    'email' => $sheetData[$i][1],
                    'username' => $sheetData[$i][2],
                    'password' => password_hash($sheetData[$i][3], PASSWORD_DEFAULT),
                    'nama' => $sheetData[$i][4],
                    'asal' => $sheetData[$i][5],
                    'no_tlp' => $sheetData[$i][6],
                    'role_id' => 2,
                    'is_active' => 1,
                    'created_date' => date('Y-m-d H:i:s'),
                    'image' => NULL,
                ];
                array_push($data, $dataBuffer);
            }
            $this->db->insert_batch('users', $data);
            $this->session->set_flashdata('message', 'Data berhasil Diimport');
            redirect('users');
        }
    }

    public function countUsers()
    {
        $this->db->where('role_id', 2);
        return $this->db->get('users')->num_rows();
    }
}
