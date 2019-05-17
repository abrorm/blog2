<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelajaran;

class PelajaranController extends Controller
{    
    public function index(Pelajaran $pelajaran)
    {
        $pelajarans = Pelajaran::all();        
        return view('pelajaran', compact('pelajaran','pelajarans'));
    }
    
}
