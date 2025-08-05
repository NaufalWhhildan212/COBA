<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSiswaRequest; 
use App\Http\Requests\UpdateSiswaRequest; 

class SiswaController extends Controller
{
    /**
     * Menampilkan daftar semua siswa.
     */
    public function index()
    {
        $siswas = Siswa::orderBy('created_at', 'desc')->paginate(10);
        return view('index', ['siswas' => $siswas]);
    }

    /**
     * Menampilkan form untuk membuat siswa baru.
     */
    public function create()
    {
        return view('Tambah');
    }

    /**
     * Menyimpan data siswa baru ke database.
     */
    public function store(StoreSiswaRequest $request)
    {
       // Validasi langsung di dalam controller
       $validatedData = $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'nis' => 'required|string|max:10|unique:tb_siswa', // <-- Pastikan nama tabel ini benar
        'kelas' => 'required|string|max:50',
    ]);

    try {
        Siswa::create($validatedData);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data siswa: ' . $e->getMessage());
    }

    }

    // --- METHOD BARU UNTUK EDIT DAN DELETE ---

    /**
     * Menampilkan form untuk mengedit data siswa.
     */
    public function edit(Siswa $siswa)
    {
        return view('edit', compact('siswa'));
    }

    /**
     * Mengupdate data siswa di database.
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        $validatedData = $request->validated();
        
        try {
            $siswa->update($validatedData);
            return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data siswa: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data siswa dari database.
     */
    public function destroy(Siswa $siswa)
    {
        try {
            $siswa->delete();
            return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data siswa: ' . $e->getMessage());
        }
    }
}