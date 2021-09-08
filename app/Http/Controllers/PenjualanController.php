<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;

use App\Models\PenjualanModel;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function __construct()
    {
        $this->PenjualanModel = new PenjualanModel();
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'penjualan' => $this->PenjualanModel->allData()
        ];
        return view('v_penjualan', $data);
    }
    public function print()
    {
        $data = [
            'penjualan' => $this->PenjualanModel->allData()
        ];
        return view('v_print', $data);
    }
    public function printpdf()
    {
        $data = [
            'penjualan' => $this->PenjualanModel->allData()
        ];
        $html = view('printpdf', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
}
