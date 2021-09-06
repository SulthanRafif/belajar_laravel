<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function __construct()
    {
        $this->PenjualanModel = new PenjualanModel();
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
}
