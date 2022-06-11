<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Curriculum extends Model
{
    protected $table = "mst_curriculum";

    protected $guarded = [];

    // get data jurusan
    public function major()
    {
        return $this->belongsTo(M_Major::class,'code_major','code');
    }   

    // get data matakuliah
    public function subject()
    {
        return $this->belongsTo(M_Subject::class,'code_subject','code');
    }

    // get data semester 
    public function semester()
    {
        return $this->belongsTo(M_Semester::class,'semester','id');
    }
    
}
