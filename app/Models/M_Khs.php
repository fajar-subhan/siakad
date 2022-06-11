<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Khs extends Model
{
    protected $table = "mst_khs";

    public function subject()
    {
        return $this->belongsTo(M_Subject::class,'subject_code','code');
    }

    public function lecturer()
    {
        return $this->belongsTo(M_Lecturer::class,'nidn','nidn');
    }
}
