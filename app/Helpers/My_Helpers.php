<?php 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * All Helpers
 *
 * @subpackage	Helpers
 * @category	All Helpers
 * @author		Fajar Subhan
 * @since       v1.0
 * 
 */

use App\Models\M_UserLogActivity;

/**
 * Retrieve the browser information used by the user
 * 
 * @return string $browser
 */
if(!function_exists('GetBrowser'))
{
    function GetBrowser()
    {
        $USER_AGENT = [];

        foreach($_SERVER as $key => $val)
        {
            // Takes only strings that start with HTTP_
            if(!strncmp("HTTP_",$key,5))
            {
                $USER_AGENT[$key] = $val;
            }
        }

        // Google Chrome 
        if(strpos($USER_AGENT['HTTP_USER_AGENT'],'Chrome') != false)
        {
            $browser = "Google Chrome";
        }
        // Internet Explore 
        else if(strpos($USER_AGENT['HTTP_USER_AGENT'],'MSIE') != false)
        {
            $browser = "Internet Explore";
        }
        // Mozila Firefox
        else if(strpos($USER_AGENT['HTTP_USER_AGENT'],'Firefox') != false)
        {
            $browser = "Mozila Firefox";
        }
        // Safari
        else if(strpos($USER_AGENT['HTTP_USER_AGENT'],'AppleWebKit') != false)
        {
            $browser = "Safari";
        }
        // Unknown Browser
        else 
        {
            $browser = "Unknown Browser";
        }

        return $browser;
    }
}

/**
 * Check if the route uri uses URI or ROUTE NAME
 * 
 * @param   string $type    : type route
 * @param   string $uri     : url path
 * @param   array  $param   : parameter
 * @return  string $routes  : routes
 */
if(!function_exists('RouteType'))
{
    function RouteType($type,$uri,$param = [])
    {
        $routes = "";
        switch($type)
        {
            case 'URI' : 
                $routes = url($uri,$param);
            break;
            case 'ROUTE_NAME' : 
                $routes = route($uri,$param);
            break;
        }

        return $routes;
    }
}

/**
 * Take one of the active academic year code data
 * 
 * @return object $years
 */
if(!function_exists('GetCodeAcademicYears'))
{
    function GetCodeAcademicYears()
    {
        $years = DB::table('mst_academic_year')
        ->select('code')
        ->where('active',1)
        ->first();

        return $years->code;
    }
}

/**
 * Retrieve lecturer nidn data from class schedule
 * 
 * @return string 
 */
if(!function_exists('GetNidnLecturer'))
{
    function GetNidnLecturer($subject_code,$major_code)
    {
        $major_code = DB::table('mst_college_student')
        ->select('major_code')
        ->where('nim',Auth::user()->nim)
        ->first()->major_code;

        $lecturer = DB::table('mst_course_schedule')
        ->select('nidn')
        ->where('subject_code',$subject_code)
        ->where('major_code',$major_code)
        ->first();

        return $lecturer->nidn ?? '-';
    }
}

/**
 * Check the semester whether you have made the khs, if you have 
 * then take the student data plus one semester
 * 
 * @return object $semester
 */
if(!function_exists('CheckSemester'))
{
    function CheckSemester()
    {
        $nim = Auth::user()->nim;
        $khs = DB::table('mst_khs')->where('nim',$nim)->count();

        if($khs > 0)
        {
            $mahasiswa = DB::table('mst_college_student')->where('nim',$nim)->first();
            return $mahasiswa->semester_id + 1;
        }
        else 
        {
            return 1;
        }

    }
}

/**
 * Fetch data icon
 * 
 * @param  integer    $iconID : Icon ID 
 * @param  string     $type   : Type Icon
 * @return collection $icon   : Return Icon
 */
if(!function_exists('GetIcon'))
{
    function GetIcon($iconID = null)
    {
        $icon = "";

        if(!is_null($iconID))
        {
            $icon = DB::table('ref_icon')
            ->select('id','icon','path_icon','type_icon')
            ->where('active',1)
            ->where('id',$iconID)
            ->orderBy('order','asc')
            ->first();
        }
        else 
        {
            $icon = DB::table('ref_icon')
            ->select('id','icon','path_icon','type_icon')
            ->where('active',1)
            ->orderBy('order','asc')
            ->first();
        }

        return $icon;
    }
}


/**
 * Check whether the roles are admin
 * 
 * @return boolean
 */
if(!function_exists('IsRolesAdmin'))
{
    function IsRolesAdmin()
    {
        return Auth::user()->roles->first()->id == 1 ? true : false;
    }
}

/**
 * Check whether the roles are user/mahasiswa
 * 
 * @return boolean
 */
if(!function_exists('IsRolesUser'))
{
    function IsRolesUser()
    {
        return Auth::user()->roles->first()->id == 2 ? true : false;
    }
}

/**
 * Check whether the roles are user/mahasiswa
 * 
 * @return boolean
 */
if(!function_exists('IsRolesDosen'))
{
    function IsRolesDosen()
    {
        return Auth::user()->roles->first()->id == 3 ? true : false;
    }
}


/**
 * Display data icon by icon id
 * 
 * @param  integer    $iconID : Icon ID 
 * @return string     $icon   : Return Icon
 */
if(!function_exists('ShowIcon'))
{
    function ShowIcon($iconID = null)
    {
        $icon = GetIcon($iconID);

        $result = "";

        switch($icon->type_icon)
        {
            case 'SVG' : 
                $result  = "<!--begin::Svg Icon | path: $icon->path_icon  --> ";
                $result .= "<span class='svg-icon svg-icon-2'>";
                $result .= "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none'>";
                $result .= "@php echo $icon->icon; @endphp";
                $result .= "</svg>";
                $result .= "</span>";
                $result .= "<!--end::Svg Icon-->";
            break;
            case 'FontAwesome' : 
                $result = "<i class='$icon->icon' style='padding-left:0.3rem'></i>";
            break;
            case 'IMG' : 
                $result = "<img src='{{ asset('$icon->path_icon') }}'>";
            break;
        }

        return $result;
    }
}

/**
 * Take the user's ip address
 * 
 * @return string $ip_address
 */
if(!function_exists('GetIP'))
{
    function GetIP()
    {
        if(!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else 
        {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        return $ip_address;
    }
}

/**
 * Retrieve the operating system information the user is using
 * 
 * @return string $os
 */
if(!function_exists('GetOS'))
{
    function GetOS()
    {
        $USER_AGENT = [];
        
        foreach($_SERVER as $key => $value)
        {
            // Takes only strings that start with HTTP_
            if(!strncmp("HTTP_",$key,5))
            {
                $USER_AGENT[$key] = $value;
            }
        }

        $os      = "Unknown Operating System";
        
        $os_list = 
        [
            'Windows 10'                =>  'windows nt 10.0',
            'Windows 8'                 =>  'windows nt 6.2',
            'Windows 7'                 =>  'windows nt 6.1',
            'Windows XP'                =>  'windows nt 5.1',
            'Windows NT 4.0'            =>  'windows nt 4.0',
            'Windows Vista'             =>  'windows nt 6.0',
            'Windows 2000'              =>  'windows nt 5.0',
            'Windows 2000 sp1'          =>  'windows nt 5.01',  
            'Windows Server 2003'       =>  'windows nt 5.2',
            'Windows 98'                =>  'windows 98',
            'Windows (version unknown)' =>  'windows',
            'Open BSD'                  =>  'openbsd',
            'Linux'                     =>  'linux',
            'Sun OS'                    =>  'sunos',
            'Mac OSX Beta (Kodiak)'     =>  'mac os x beta',
            'Mac OSX Cheetah'           =>  'mac os x 10.0',
            'Mac OSX Puma'              =>  'mac os x 10.1',
            'Mac OSX Jaguar'            =>  'mac os x 10.2',
            'Mac OSX Panther'           =>  'mac os x 10.3',
            'Mac OSX Tiger'             =>  'mac os x 10.4',
            'Mac OSX Leopard'           =>  'mac os x 10.5',
            'Mac OSX Snow Leopard'      =>  'mac os x 10.6',
            'Mac OSX Lion'              =>  'mac os x 10.7',
            'Mac OSX (version unknown)' =>  'mac os x',
            'Mac OS (classic)'          =>  '(mac_powerpc)|(macintosh)',
            'QNX'                       =>  'qnx',
            'BeOS'                      =>  'beos',
            'OS/2'                      =>  'os/2',
            'SearchBot'                 =>  '(nuhk)|(googlebot)|(yammybot)|(openbot)|(slurp)|(msnbot)|(ask jeeves/teoma)|(ia_archiver)'
        ];

        
        if(is_array($os_list))
        {
            $USER_AGENT = strtolower($USER_AGENT['HTTP_USER_AGENT']);
            if(!empty($USER_AGENT))
            {
                foreach($os_list as $os_info => $match)
                {
                    // Check the pattern of the array variables os_list and HTTP_USER_AGENT
                    if(preg_match("/$match/i",$USER_AGENT))
                    {
                        $os = $os_info;
                        break;
                    }
                }
            }
        }

        return $os;
    }
}

/**
 * Create a log to view user activity,
 * and enter it into the mst_user_log_activity table
 * 
 * @param string $module : module name or controller name
 * @param string $name   : activity name
 * @param string $desc   : User login | User logout 
 * @param string $userid : user id 
 */
if(!function_exists("EventLoger"))
{
    function EventLoger($module = "",$name = "",$desc = "" ,$userid = "")
    {
        M_UserLogActivity::create([
            'user_activity_module'  => $module,
            'user_id'               => $userid,
            'user_activity_name'    => $name,
            'user_activity_desc'    => $desc,
            'user_activity_address' => GetIP(),
            'user_activity_browser' => GetBrowser(),
            'user_activity_os'      => GetOS(),
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s')
        ]);
    }
}

/**
 * Calculating value
 * @link // Sumber : https://www.youthmanual.com/post/dunia-kuliah/kehidupan-mahasiswa/bagaimana-cara-menghitung-ipk-ini-dia-rumusnya
 * 
 * @return int $result
 */
if(!function_exists('CalculateValue'))
{
    function CalculateValue($idKHS)
    {
        $khs  = DB::table('mst_khs')->where('id',$idKHS)->first();
        $uts  = $khs->nilai_uts * (30/100);
        $uas  = $khs->nilai_uas * (30/100);
        $tugas= $khs->nilai_tugas * (20/100);
        $kehadiran = $khs->nilai_kehadiran * (20/100);
        $result    = $uts+$uas+$tugas+$kehadiran;

        return $result;
    }
}

/**
 * Calculate Grade 
 * 
 * @return string $grade
 */
if(!function_exists('CalculateGrade'))
{
    function CalculateGrade($nilai)
    {
        if($nilai > 81)
        {
            $grade = "A";
        }
        else if($nilai > 75)
        {
            $grade = "B";
        }
        else if($nilai > 45)
        {
            $grade = "D";
        }
        else 
        {
            $grade = "E";
        }

        return $grade;
    }
}


if(!function_exists('CalculateMutu'))
{
    function CalculateMutu($grade)
    {
        if($grade == "A")
        {
            $mutu = 4;
        }
        else if($grade == "B")
        {
            $mutu = 3;
        }
        else if($grade == "C")
        {
            $mutu = 2;
        }
        else if($grade == "D")
        {
            $mutu = 1;
        }
        else 
        {
            $mutu = 0;
        }

        return $mutu;
    }
}