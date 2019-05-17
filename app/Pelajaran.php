<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $fillable = ['nama','photo'];

    public function materi()
    {
    	return $this->hasMany(Materi::class);
    }
}
