<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class M_TeachingSchedule extends Model
{
    /**
     * Retrieve lecturer's teaching schedule data
     * 
     * @return array $result_array
     */
    public static function _getDataTeaching()
    {
        $result_array = array();

        $data = DB::table('mst_course_schedule as a')
        ->select(
            'a.id',
            'c.name as subject_name',
            'a.day as days',
            'd.name as hours',
            'b.name as room_name',
            'e.name as major_name'
        )
        ->join('mst_room as b','b.code','=','a.room_code','inner')
        ->join('mst_subject as c','c.code','=','a.subject_code','inner')
        ->join('mst_lecture_hours as d','d.id','=','a.hours_id','inner')
        ->join('mst_major as e','e.code','=','a.major_code','inner')
        ->where('a.nidn',Auth::user()->nidn);

        if($data->count() > 0)
        {
            $result_array = $data->get();
        } 

        return $result_array;
    }
}
