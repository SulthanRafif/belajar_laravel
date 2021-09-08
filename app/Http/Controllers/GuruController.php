<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;


class GuruController extends Controller
{
    public function __construct()
    {
        $this->GuruModel = new GuruModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'guru' => $this->GuruModel->allData(),
        ];
        return view('v_guru', $data);
    }

    public function detail($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) {
            abort(404);
        }
        $data = [
            'guru' => $this->GuruModel->detailData($id_guru),
        ];
        return view('v_detailguru', $data);
    }

    public function add()
    {
        return view('v_addguru');
    }

    public function insert()
    {
        // Melakukan Proses Validasi
        Request()->validate([
            'nip' => 'required|unique:tbl_guru,nip|min:4|max:5',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'required|mimes:jpg,jpeg,bmp,png|max:1024'
        ], [
            'nip.required' => 'NIP Wajib Diisi',
            'nip.unique' => 'NIP Ini Sudah Ada',
            'nip.min' => 'NIP Minimal 4 Karakter',
            'nip.max' => 'NIP Maksimal 5 Karakter',
            'nama_guru.required' => 'Nama Guru Wajib Diisi',
            'mapel.required' => 'Mata Pelajaran Guru Wajib Diisi',
            'foto_guru.required' => 'Foto Guru Wajib Diisi',
        ]);

        // Jika Validasi Berhasil Maka Lakukan Simpan Data
        // Upload Gambar/Foto
        $file = Request()->foto_guru;
        $fileName = Request()->nip . '.' . $file->extension();
        $file->move(public_path('foto_guru'), $fileName);

        $data = [
            'nip' => Request()->nip,
            'nama_guru' => Request()->nama_guru,
            'mapel' => Request()->mapel,
            'foto_guru' => $fileName,
        ];

        $this->GuruModel->addData($data);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) {
            abort(404);
        }
        $data = [
            'guru' => $this->GuruModel->detailData($id_guru),
        ];
        return view('v_editguru', $data);
    }

    public function update($id_guru)
    {
        // Melakukan Proses Validasi
        Request()->validate([
            'nama_guru' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'mimes:jpg,jpeg,bmp,png|max:1024'
        ], [
            'nama_guru.required' => 'Nama Guru Wajib Diisi',
            'mapel.required' => 'Mata Pelajaran Guru Wajib Diisi'
        ]);

        // Jika Validasi Berhasil Maka Lakukan Simpan Data
        if (Request()->foto_guru <> "") {
            // jika ingin ganti foto
            // Upload Gambar/Foto
            $file = Request()->foto_guru;
            $fileName = Request()->nip . '.' . $file->extension();
            $file->move(public_path('foto_guru'), $fileName);

            $data = [
                'nip' => Request()->nip,
                'nama_guru' => Request()->nama_guru,
                'mapel' => Request()->mapel,
                'foto_guru' => $fileName,
            ];

            $this->GuruModel->editData($id_guru, $data);
        } else {
            // jika tidak ingin ganti foto
            $data = [
                'nip' => Request()->nip,
                'nama_guru' => Request()->nama_guru,
                'mapel' => Request()->mapel
            ];
            $this->GuruModel->editData($id_guru, $data);
        }
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Di Update');
    }

    public function delete($id_guru)
    {
        $this->GuruModel->deleteData($id_guru);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Di Delete');
    }

    public function deleteData($id_guru)
    {
        // hapus atau delete foto
        $guru = $this->GuruModel->detailData($id_guru);
        if ($guru->foto_guru <> "") {
            unlink(public_path('foto_guru') . '/' . $guru->foto_guru);
        }
        $this->GuruModel->deleteData($id_guru);
        return redirect()->route('guru')->with('pesan', "Data Berhasil Di Hapus");
    }
}
