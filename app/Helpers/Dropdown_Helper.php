<?php

use App\Models\M_Dropdown;
use Illuminate\Support\Facades\DB;

if(!function_exists('Dropdown'))
{
    function Dropdown()
    {
        $obj = new M_Dropdown();

        return $obj;
    }
}

/**
 * Status form
 * 
 * 0 = Tidak Aktif | 1 = Aktif
 * 
 * @return array $status
 */
if(!function_exists('status_form'))
{
    function status_form()
    {
        $status = 
        [
            1 => 'Aktif',
            0 => 'Tidak Aktif'
        ];

        if(is_array($status) && count($status) > 0)
        {
            return $status;
        }
    }
}

/**
 * List User All 
 * 
 * @return array 
 */
if(!function_exists('list_user'))
{
    function list_user()
    {
        return Dropdown()->_user('user');
    }
}

/**
 * Semester Active 
 *
 * @return array  
 */
if(!function_exists('semester'))
{
    function semester()
    {
        return Dropdown()->_semester();
    }
}

/**
 * Email list user data active
 * 
 * @return array
 */
if(!function_exists('email'))
{
    function email()
    {
        return Dropdown()->_user('email');
    }
}

/**
 * List data roles
 * 
 * @return array
 */
if(!function_exists('roles'))
{
    function roles()
    {
        return Dropdown()->_roles();
    }
}

/**
 * Major list data 
 * 
 * @return array 
 */
if(!function_exists('major'))
{
    function major()
    {
        return Dropdown()->_major();
    }
}

/**
 * Subject list data 
 * 
 * @return array 
 */
if(!function_exists('subject'))
{
    function subject()
    {
        return Dropdown()->_subject();
    }
}

/**
 * Check attendance on each student
 * 
 * @param int $nim
 * @param int $meeting_to
 * @return string $history
 */
if(!function_exists('check_presence'))
{
    function check_presence($nim,$meeting_to,$schedule)
    {
        $history  = DB::table('mst_attendence_history as a')
        ->join('ref_status_presence as b','a.status_presence_id','=','b.id')
        ->where('nim',$nim)
        ->where('meeting_to',$meeting_to)
        ->where('nidn',$schedule->nidn)
        ->where('subject_code',$schedule->subject_code);
        
        if($history->count() > 0)
        {
            switch($history->first()->desc)
            {
                case 'H' : 
                    $history = '<span class="badge badge-success"><strong>'.$history->first()->desc.'</strong></span>';
                break;
                case 'I' : 
                    $history = '<span class="badge badge-primary"><strong>'.$history->first()->desc.'</strong></span>'; 
                break;
                case 'A' : 
                    $history = '<span class="badge badge-danger"><strong>'.$history->first()->desc.'</strong></span>'; 
                break;
                case 'S' : 
                    $history = '<span class="badge badge-dark"><strong>'.$history->first()->desc.'</strong></span>'; 
                break;
            }
        }
        else 
        {
            $history = '
            <span class="svg-icon svg-icon-danger svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M12 10.6L14.8 7.8C15.2 7.4 15.8 7.4 16.2 7.8C16.6 8.2 16.6 8.80002 16.2 9.20002L13.4 12L12 10.6ZM10.6 12L7.8 14.8C7.4 15.2 7.4 15.8 7.8 16.2C8 16.4 8.3 16.5 8.5 16.5C8.7 16.5 8.99999 16.4 9.19999 16.2L12 13.4L10.6 12Z" fill="black"/>
            <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM13.4 12L16.2 9.20001C16.6 8.80001 16.6 8.19999 16.2 7.79999C15.8 7.39999 15.2 7.39999 14.8 7.79999L12 10.6L9.2 7.79999C8.8 7.39999 8.2 7.39999 7.8 7.79999C7.4 8.19999 7.4 8.80001 7.8 9.20001L10.6 12L7.8 14.8C7.4 15.2 7.4 15.8 7.8 16.2C8 16.4 8.3 16.5 8.5 16.5C8.7 16.5 9 16.4 9.2 16.2L12 13.4L14.8 16.2C15 16.4 15.3 16.5 15.5 16.5C15.7 16.5 16 16.4 16.2 16.2C16.6 15.8 16.6 15.2 16.2 14.8L13.4 12Z" fill="black"/>
            </svg></span>
            ';
        }

        return $history;
    }
}

/**
 * 
 */

/**
 * Aacademic Year list data 
 * 
 * @return array 
 */
if(!function_exists('academic_year'))
{
    function academic_year()
    {
        return Dropdown()->_academic_year();
    }
}

/**
 * Faculty list data 
 * 
 * @return array 
 */
if(!function_exists('faculty'))
{
    function faculty()
    {
        return Dropdown()->_faculty();
    }
}

/**
 * List of education level data
 * 
 * @return array 
 */
if(!function_exists('college_level'))
{
    function college_level()
    {
        return Dropdown()->_college_level();
    }
}

/**
 * Lecturer list data 
 * 
 * @return array 
 */
if(!function_exists('lecturer'))
{
    function lecturer()
    {
        return Dropdown()->_lecturer();
    }
}

/**
 * Room list data 
 * 
 * @return array 
 */
if(!function_exists('room'))
{
    function room()
    {
        return Dropdown()->_room();
    }
}

/**
 * Days list data 
 * 
 * @return array $day
 */
if(!function_exists('day'))
{
    function day()
    {
        $day = 
        [
            'Senin' => 'Senin',
            'Selasa'=> 'Selasa',
            'Rabu'  => 'Rabu',
            'Kamis' => 'Kamis',
            'Jumat' => 'Jumat',
            'Sabtu' => 'Sabtu',
            'Minggu'=> 'Minggu'
        ];

        return $day;
    }
}

/**
 * Hours list data 
 * 
 * @return array 
 */
if(!function_exists('hour'))
{
    function hour()
    {   
        return Dropdown()->_hour();
    }
}