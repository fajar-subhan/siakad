<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Dropdown extends Model
{
    /** 
     * Semester Active
     * 
     * @return array $semester
     */
    public function _semester()
    {
        $semester = DB::table('ref_semester')
        ->select('id','name')
        ->where('active','=',1)
        ->orderBy('order','asc')
        ->get()
        ->pluck('name','id')->toArray();

        return $semester;
    }

    /**
     * Major Active Data
     * 
     * @return array $major 
     */
    public function _major()
    {
        $major = DB::table('mst_major')
        ->select('code','name')
        ->where('active','=',1)
        ->orderBy('order','asc')
        ->get()
        ->pluck('name','code')->toArray();

        return $major;
    }

    /**
     * Subject Active Data
     * 
     * @return array $subject 
     */
    public function _subject()
    {
        $subject = DB::table('mst_subject')
        ->select('code','name')
        ->where('active','=',1)
        ->orderBy('order','asc')
        ->get()
        ->pluck('name','code')->toArray();

        return $subject;
    }

    /**
     * List user active data
     * 
     * @param string $params
     * @return array $user 
     */
    public function _user($params)
    {
        
        switch($params) 
        {
            case 'user' :
                $user = DB::table('users')
                ->select('id','name')
                ->where('user_active',1)
                ->orderBy('user_order','asc')
                ->pluck('name','id')->toArray();
            break;
            case 'email' : 
                $user = DB::table('users')
                ->select('id','email')
                ->where('user_active',1)
                ->orderBy('user_order','asc')
                ->pluck('email','id')->toArray();
            break;
        }

        return $user;
    }
    


    /**
     * Academic Year Active Data
     * 
     * @return array $academic 
     */
    public function _academic_year()
    {
        $academic = DB::table('mst_academic_year')
        ->select('code','name')
        ->where('active','=',1)
        ->orderBy('order','asc')
        ->get()
        ->pluck('name','code')->toArray();

        return $academic;
    }

    /**
     * Faculty Active Data
     * 
     * @return array $faculty 
     */
    public function _faculty()
    {
        $faculty = DB::table('mst_faculty')
        ->select('code','name')
        ->where('active','=',1)
        ->orderBy('order','asc')
        ->get()
        ->pluck('name','code')->toArray();

        return $faculty;
    }

    /**
     * 
     * @return array $college_level
     */
    public function _college_level()
    {
        $college_level = DB::table('ref_college_level')
        ->select('id','name')
        ->where('active',1)
        ->orderBy('order','asc')
        ->get()
        ->pluck('name','id')->toArray();

        return $college_level;
    }

    /**
     * List data roles
     * 
     * @return array $roles
     */
    public function _roles()
    {
        $roles = DB::table('roles as a')
        ->select('id','name')
        ->where('active',1)
        ->orderBy('order','asc')
        ->pluck('name','id')
        ->toArray();

        return $roles;
    }

    /**
     * Lecturer Active Data
     * 
     * @return array $lecturer 
     */
    public function _lecturer()
    {
        $faculty = DB::table('mst_lecturer')
        ->select('nidn','name')
        ->where('active','=',1)
        ->orderBy('order','asc')
        ->get()
        ->pluck('name','nidn')->toArray();

        return $faculty;
    }

    /**
     * Room Active Data
     * 
     * @return array $room 
     */
    public function _room()
    {
        $faculty = DB::table('mst_room')
        ->select('code','name')
        ->where('active','=',1)
        ->orderBy('order','asc')
        ->get()
        ->pluck('name','code')->toArray();

        return $faculty;
    }

    /**
     * Hours Active Data
     * 
     * @return array $room 
     */
    public function _hour()
    {
        $faculty = DB::table('mst_lecture_hours')
        ->select('id','name')
        ->where('active','=',1)
        ->orderBy('order','asc')
        ->get()
        ->pluck('name','id')->toArray();

        return $faculty;
    }
}
