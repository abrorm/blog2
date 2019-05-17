<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_Materi extends Model
{
    protected $fillable = ['materi_id','konten','photo'];

    public function materi()
    {
    	return $this->belongsTo(Materi::class);
    }
}
