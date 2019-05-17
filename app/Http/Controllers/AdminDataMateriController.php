<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;
use App\Data_Materi;

class AdminDataMateriController extends Controller
{

    public function store(Request $request, Materi $materi)
    {
        $this->validate(request(),[
            'photo' => 'required',
        ]);
        
        $photo = $request->file('photo')->store('photos');

        Data_Materi::create([            
            'materi_id'=> $materi->id,
            'photo' => $photo,
            'konten' => request('konten'),
        ]);

        return redirect()->back()->withSuccess('Data Materi berhasil ditambahkan!');
    }

    public function edit(Data_Materi $dataMateri,Materi $materi)
    {
        return view('admin.editDataMateri', compact('dataMateri','materi'));
    }

    public function update(Request $request, Data_Materi $dataMateri, Materi $materi)
    {
        if ($request->dataMateri()->photo) {
            Storage::delete($request->dataMateri()->photo);
        }

        $photo = $request->file('photo')->store('photos');

        $dataMateri->update([
            'materi_id'=> $materi->id,
            'photo'=>$photo,
            'konten'=>request('konten')
        ]);
        $materis = Materi::all();
        return view('Admin.materi', compact('materi','materis'))->withInfo('Data Materi sudah di update');
    }

    public function delete(Data_Materi $dataMateri)
    {
        $dataMateri->delete();

        return redirect()->back()->withDanger('Data Materi dihapus !');
    }

}
