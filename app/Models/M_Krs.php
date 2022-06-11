<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Krs extends Model
{
    protected $table = "mst_krs";

    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(M_Subject::class,'subject_code','code');
    }
}
