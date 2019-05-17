<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;
use App\Pelajaran;

class MateriController extends Controller
{    
    public function index1()
    {
        $posts = Materi::latest()->paginate(5);
        return view('home', compact('materi'));
    }
    
    public function index()
    {
        $pelajarans = Pelajaran::all();
        return view('home', compact('pelajarans'));
    }
    
    public function details(Materi $materi)
    {
        $materis = Materi::all();
        return view('materi', compact('materi','materis'));
    }
}
