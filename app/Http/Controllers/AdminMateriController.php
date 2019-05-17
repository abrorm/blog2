<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;
use App\Pelajaran;

class AdminMateriController extends Controller
{
    public function index()
    {
        $pelajarans = Pelajaran::all();
        return view('Admin.home',compact('pelajarans'));
    }
    
    public function pelajaran(Pelajaran $pelajaran)
    {
        $pelajarans = Pelajaran::all();        
        return view('Admin.pelajaran', compact('pelajaran','pelajarans'));
    }

    public function details(Materi $materi)
    {       
       $materis = Materi::all();
       return view('Admin.materi', compact('materi','materis'));
    }

    public function create(Pelajaran $pelajaran)
    {
        $pelajarans = Pelajaran::all();  
        return view('Admin.createMateri',compact('pelajaran','pelajarans'));
    }

    public function store(Pelajaran $pelajaran)
    {
        $this->validate(request(),[
            'judul' => 'required'
        ]);

        Materi::create([
            'judul'=>request('judul'),
            'pelajaran_id'=>$pelajaran->id
        ]);

        $pelajarans = Pelajaran::all(); 

        return view('Admin.pelajaran', compact('pelajaran','pelajarans'))->withSuccess('Berhasil menambahkan materi ');
    }

    public function edit(Materi $materi,Pelajaran $pelajaran)
    {
        $pelajarans = Pelajaran::all();
        return view('Admin.editMateri', compact('materi','pelajaran','pelajarans'));
    }

    public function update(Request $request, Materi $materi,Pelajaran $pelajaran)
    {
        $materi->update([
            'pelajaran_id'=>$pelajaran->id,
            'judul'=> request('judul'),           
        ]);

        $pelajarans = Pelajaran::all(); 

        return view('Admin.pelajaran', compact('pelajaran','pelajarans'))->withInfo('Judul materi sudah di ubah');
    }

    public function delete(Materi $materi)
    {
        $materi->delete();

        return redirect()->back()->withDanger('Materi dihapus !');
    }

}
