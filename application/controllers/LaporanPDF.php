<?php
Class LaporanPDF extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_qrcode');
        $this->load->helper('file');
    }

    function index($id){
        $data['dataQrcode'] = $this->M_qrcode->select_by_id($id);
        $data['image'] = base64_encode(read_file(base_url('/assets/images/').$data['dataQrcode']->foto_qrcode));
        // return $this->load->view('laporan_qrcode', $data);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "laporan-qrcode-".$data['dataQrcode']->id_qrcode.".pdf";
        $this->pdf->load_view('laporan_qrcode', $data);
        $this->pdf->stream($this->filename, array("Attachment" => true));

    }
}