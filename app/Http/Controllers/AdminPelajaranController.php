<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelajaran;

class AdminPelajaranController extends Controller
{

    public function create()
    { 
        return view('Admin.createPelajaran');
    }

    public function store(Request $request)
    {       
        $photo = $request->file('photo')->store('photos');

        Pelajaran::create([
            'nama' => request('nama'),
            'photo' => $photo
        ]);

        return redirect()->route('admin.home')->withSuccess('Berhasil menambahkan Pelajaran ');
    }

    public function edit(Pelajaran $pelajaran)
    {
        return view('Admin.editPelajaran', compact('pelajaran'));
    }

    public function update(Pelajaran $pelajaran, Request $request)
    {                        
        $photo = $request->file('photo')->store('photos');

        $pelajaran->update([
            'nama' => request('nama'),
            'photo' => $photo
        ]);
        
        return redirect()->route('admin.home')->withInfo('Berhasil mengubah Pelajaran ');
    }

    public function delete(Pelajaran $pelajaran)
    {   
        $pelajaran->delete();

        return redirect()->route('admin.home')->withDanger('Pelajaran dihapus !');
    }

}
