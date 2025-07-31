<?php

namespace App\Http\Controllers;

use App\Models\Siswa; 
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    
    public function index()
    {
        $siswas = Siswa::orderBy('created_at', 'desc')->get();
        return view('index', ['siswas' => $siswas]);
    }

   
    public function create()
    {
        return view('Tambah');
    }

    
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nis' => 'required|string|max:10|unique:tb_siswa',
            'kelas' => 'required|string|max:50',
        ]);

        
        Siswa::create($validatedData);


        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }
}