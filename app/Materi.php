<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = ['judul','pelajaran_id'];

    public function pelajaran()
    {
    	return $this->belongsTo(Pelajaran::class);
    }

    public function dataMateri()
    {
    	return $this->hasMany(Data_Materi::class);
    }

}
