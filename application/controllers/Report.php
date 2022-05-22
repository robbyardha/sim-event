<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Event_model');
        $this->load->model('Peserta_model');
        $this->load->model('Users_model');
        $this->load->model('Scan_model');

        $this->load->library('Pdf');

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

    public function index($keyword = null)
    {
        $data['title'] = "Kehadiran - SIM Event";
        $data['event'] = $this->Event_model->getAll();
        // $data['eventid'] = $this->Event_model->getByid();
        $data['peserta'] = $this->Peserta_model->getAlldata();
        // $data['joinhadirevent'] = $this->Scan_model->joinDataHadirWithEvent();

        // var_dump($data['peserta']);
        // die;

        // FOR LONG LAST QUERY
        // ini_set("xdebug.var_display_max_children", '-1');
        // ini_set("xdebug.var_display_max_data", '-1');
        // ini_set("xdebug.var_display_max_depth", '-1');
        // var_dump($this->db->last_query($data['joinhadirevent']));
        // die;

        $data['keyword'] = null;
        if ($this->input->post('keyword') != null) {
            $keyword = $this->input->post('keyword');
            $data['keyword'] =  $this->Scan_model->carikeyword($keyword);
            // var_dump($data['keyword']);
            // die;
        } else {
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/report/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function kehadiran($id)
    {
        $data['title'] = "Kehadiran - SIM Event";
        $data['event'] = $this->Event_model->getAll();
        $data['eventid'] = $this->Event_model->getByid($id);
        $data['peserta'] = $this->Peserta_model->getAlldata();
        $data['joinhadirevent'] = $this->Scan_model->joinDataHadirWithEvent($id);

        // var_dump($data['peserta']);
        // die;

        // FOR LONG LAST QUERY
        // ini_set("xdebug.var_display_max_children", '-1');
        // ini_set("xdebug.var_display_max_data", '-1');
        // ini_set("xdebug.var_display_max_depth", '-1');
        // var_dump($this->db->last_query($data['joinhadirevent']));
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/report/kehadiran', $data);
        $this->load->view('layout/footer', $data);
    }

    public function exportxls($id)
    {
        $data['title'] = "Kehadiran - SIM Event";
        $data['event'] = $this->Event_model->getAll();
        $data['eventid'] = $this->Event_model->getByid($id);
        $data['peserta'] = $this->Peserta_model->getAlldata();
        $data['joinhadirevent'] = $this->Scan_model->joinDataHadirWithEvent($id);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        $sheet->setCellValue('A1', 'ID Peserta');
        $sheet->setCellValue('B1', 'Nama Event');
        $sheet->setCellValue('C1', 'Nama Peserta');
        $sheet->setCellValue('D1', 'Asal');
        $sheet->setCellValue('E1', 'No Tlp');
        $sheet->setCellValue('F1', 'Waktu Kehadiran');
        $sheet->setCellValue('G1', 'Status');
        for ($i = 0; $i < sizeof($data['joinhadirevent']); $i++) {
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $i + 2, "'" . $data['joinhadirevent'][$i]['uuid']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $i + 2, $data['joinhadirevent'][$i]['nama_event']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $i + 2, $data['joinhadirevent'][$i]['nama']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $i + 2, $data['joinhadirevent'][$i]['asal']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $i + 2, $data['joinhadirevent'][$i]['no_tlp']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(6, $i + 2, $data['joinhadirevent'][$i]['waktu_kehadiran']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(7, $i + 2, $data['joinhadirevent'][$i]['status_kehadiran']);
        }
        $writer = new Xlsx($spreadsheet);
        $offset = 7 * 60 * 60;

        $filename = 'Laporan Data Peserta' . gmdate('Y-m-d H:i:s', time() + $offset);
        // Add OB & Clean
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output'); // download file




        // var_dump($data['peserta']);
        // die;

        // FOR LONG LAST QUERY
        // ini_set("xdebug.var_display_max_children", '-1');
        // ini_set("xdebug.var_display_max_data", '-1');
        // ini_set("xdebug.var_display_max_depth", '-1');
        // var_dump($this->db->last_query($data['joinhadirevent']));
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/report/kehadiran', $data);
        $this->load->view('layout/footer', $data);
    }

    public function exportpdf($id)
    {

        $data['title'] = "Report Kehadiran - SIM Event";
        $data['event'] = $this->Event_model->getAll();
        $data['eventid'] = $this->Event_model->getByid($id);
        $data['peserta'] = $this->Peserta_model->getAlldata();
        $data['joinhadirevent'] = $this->Scan_model->joinDataHadirWithEvent($id);

        // var_dump($data['peserta']);
        // die;

        // FOR LONG LAST QUERY
        // ini_set("xdebug.var_display_max_children", '-1');
        // ini_set("xdebug.var_display_max_data", '-1');
        // ini_set("xdebug.var_display_max_depth", '-1');
        // var_dump($this->db->last_query($data['joinhadirevent']));
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/footer');
        // $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Laporan Kehadiran Event.pdf";
        $this->pdf->load_view('content/report/laporan_kehadiran', $data);
    }


    public function dataqr()
    {
        $data['title'] = "Data QR - SIM Event";
        $data['event'] = $this->Event_model->getAll();
        $data['peserta'] = $this->Peserta_model->getAlldata();
        $data['joinwithevent'] = $this->Scan_model->joinDataPesertaWithEvent();

        // var_dump($data['peserta']);
        // die;

        // FOR LONG LAST QUERY
        // ini_set("xdebug.var_display_max_children", '-1');
        // ini_set("xdebug.var_display_max_data", '-1');
        // ini_set("xdebug.var_display_max_depth", '-1');
        // var_dump($this->db->last_query($data['joinhadirevent']));
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/report/dataqr', $data);
        $this->load->view('layout/footer', $data);
    }


    public function exportpdfqr()
    {

        $data['title'] = "Report QRCode Peserta - SIM Event";
        $data['event'] = $this->Event_model->getAll();
        $data['peserta'] = $this->Peserta_model->getAlldata();
        $data['joinwithevent'] = $this->Scan_model->joinDataPesertaWithEvent();

        // var_dump($data['peserta']);
        // die;

        // FOR LONG LAST QUERY
        // ini_set("xdebug.var_display_max_children", '-1');
        // ini_set("xdebug.var_display_max_data", '-1');
        // ini_set("xdebug.var_display_max_depth", '-1');
        // var_dump($this->db->last_query($data['joinhadirevent']));
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('layout/footer');
        // $this->pdf->setPaper('A4', 'portrait');
        // $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->setPaper('legal', 'landscape');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = "Peserta QRCode.pdf";
        $this->pdf->load_view('content/report/pesertaqr', $data);
        $this->pdf->render();
    }
}
