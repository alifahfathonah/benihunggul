<?php
class LaporanPDF extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_qrcode');
        $this->load->helper('file');
    }

    function index($id)
    {
        $data['dataQrcode'] = $this->M_qrcode->select_by_id($id);

        if (($data['dataQrcode']->akhir_masa_edar) < (date("Y-m-d"))) {
            // echo "Benih sudah kadaluarsa!";
            $this->load->view('benih_expired');
        } else if (($data['dataQrcode']->masa_berlaku) < (date("Y-m-d"))) {
            // echo "Sertifikat sudah tidak berlaku!";
            $this->load->view('sertifikat_expired');
        } else if (($data['dataQrcode']->tgl) < (date("Y-m-d"))) {
            //echo "Label sudah tidak berlaku!";
            $this->load->view('label_expired');
        } else {
            $data['image'] = base64_encode(read_file(base_url('/assets/images/') . $data['dataQrcode']->foto_qrcode));
            // return $this->load->view('laporan_qrcode', $data);
            $this->pdf->setPaper('A6', 'landscape');
            $this->pdf->filename = "laporan-qrcode-" . $data['dataQrcode']->id_qrcode . ".pdf";
            $this->pdf->load_view('laporan_qrcode', $data);
            $this->pdf->stream($this->filename, array("Attachment" => true));
        }
    }
}
