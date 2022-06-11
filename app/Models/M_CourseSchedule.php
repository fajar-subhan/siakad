<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_CourseSchedule extends Model
{
    protected $table = 'mst_course_schedule';

    protected $guarded = [];

    public function subject() 
    {
        return $this->belongsTo(M_Subject::class,'subject_code','code');
    }

    public function hour()
    {
        return $this->belongsTo(M_LectureHours::class,'hours_id','id');
    }

    public function room()
    {
        return $this->belongsTo(M_Room::class,'room_code','code');
    }

    public function lecturer()
    {
        return $this->belongsTo(M_Lecturer::class,'nidn','nidn');
    }
    
    public function major()
    {
        return $this->belongsTo(M_Major::class,'major_code','code');
    }

    public function semester()
    {
        return $this->belongsTo(M_Semester::class,'semester_id','id');
    }
}
