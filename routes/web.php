<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ===== Begin::Module Login ===== */
Route::get('/','Auth\LoginController@index')->name('login');
Route::post('/password/checkuser','Auth\ResetController@checkUser');
Route::post('/login','Auth\LoginController@login')->name('login.post');
/* ===== End::Module Login ===== */

/* ===== Begin::Module Reset ===== */
// Form reset by email address
Route::get('/password/reset','Auth\ResetController@showLinkRequestForm')->name('password.request');
// Proses reset password 
Route::post('/password/reset','Auth\ResetController@reset')->name('password.process');

Route::get('password/reset/form-email','Auth\ResetController@resetForm');
Route::patch('password/reset/proses-password','Auth\ResetController@prosesUpdate');
/* ===== End::Module Reset ===== */

/* ===== Begin::Profile ======== */
Route::resource('profile','ProfileController')->middleware('auth');
/* ===== End::Profile ======== */

/* ====== Begin::Module Logout ========== */
Route::get('/logout','Auth\LoginController@logout')->name('logout');
/* ====== End::Module Logout ========== */

/* --------- Start Roles Admin ------------- */
Route::group(['middleware' => ['role:Admin','auth']],function()
{
    /* ----- Ruangan ------ */
    Route::get('ruangan/data','RoomController@data')->name('ruangan.data');
    Route::post('ruangan/check_code','RoomController@checkCode')->name('ruangan.check_code');
    Route::resource('ruangan','RoomController');

    /* ----- Matakuliah ------- */
    Route::get('matakuliah/data','SubjectController@data')->name('matakuliah.data');
    Route::post('matakuliah/check_code','SubjectController@checkCode')->name('matakuliah.check_code');
    Route::resource('matakuliah','SubjectController');

    /* ---- Fakultas ----- */
    Route::get('fakultas/data','FacultyController@data')->name('fakultas.data');
    Route::post('fakultas/check_code','FacultyController@checkCode')->name('fakultas.check_code');
    Route::resource('fakultas','FacultyController');

    /* ----- Jurusan ----- */
    Route::get('jurusan/data','MajorController@data')->name('jurusan.data');
    Route::post('jurusan/check_code','MajorController@checkCode')->name('jurusan.check_code');
    Route::resource('jurusan','MajorController');

    /* ----- Kurikulum ----- */
    Route::get('kurikulum/data','CurriculumController@data')->name('kurikulum.data');
    Route::post('kurikulum/check_code','CurriculumController@checkCode')->name('kurikulum.check_code');
    Route::resource('kurikulum','CurriculumController');

    /* ----- Tahun Akademik ----- */
    Route::get('tahun-akademik/data','AcademicYearController@data')->name('tahunakademik.data');
    Route::post('tahun-akademik/check_code','AcademicYearController@checkCode')->name('tahunakademik.check_code');
    Route::resource('tahun-akademik','AcademicYearController');

    /* ----- Mahasiswa ----- */
    Route::get('mahasiswa/data','CollegeStudentController@data')->name('mahasiswa.data');
    Route::post('mahasiswa/check_code','CollegeStudentController@checkCode')->name('mahasiswa.check_code');
    Route::post('mahasiswa/check_email','CollegeStudentController@checkEmail')->name('mahasiswa.check_email');
    Route::resource('mahasiswa','CollegeStudentController');

    /* ----- Dosen ----- */
    Route::get('dosen/data','LecturerController@data')->name('dosen.data');
    Route::post('dosen/check_code','LecturerController@checkCode')->name('dosen.check_code');
    Route::resource('dosen','LecturerController');

    /* ----- Informasi Kampus ------ */
    Route::get('infomasi-kampus/data','CampusInfoController@show');
    Route::resource('informasi-kampus','CampusInfoController');

    /* ----- Jam Kuliah ----- */
    Route::get('jam-kuliah/data','LectureHoursController@data')->name('jam-kuliah.data');
    Route::post('jam-kuliah/check_code','LectureHoursController@checkCode')->name('jam-kuliah.check_code');
    Route::resource('jam-kuliah','LectureHoursController');

    /* ----- Pengguna ----- */
    Route::get('pengguna/data','UserController@data')->name('pengguna.data');
    Route::post('pengguna/check_code','UserController@checkCode')->name('pengguna.check_code');
    Route::resource('pengguna','UserController');

    /* ----- Ambil data matakuliah berdasarkan jurusan ---- */
    Route::post('getsubjectbymajor1','CurriculumController@getsubject');
    Route::post('getsubjectbymajor2','CourseScheduleController@getsubject');
});
/* ------------ End Roles Admin ------------------- */

Route::group(['middleware' => ['role:Admin|User','auth']],function()
{
    /* ----- Jadwal kuliah ----- */
    Route::get('jadwal-kuliah/data','CourseScheduleController@data')->name('jadwal-kuliah.data');
    Route::post('jadwal-kuliah/check_code','CourseScheduleController@checkCode')->name('jadwal-kuliah.check_code');
    Route::resource('jadwal-kuliah','CourseScheduleController');
});

/* ------------ Start Dashboard Roles Admin|User|Dosen ------------------- */
Route::group(['middleware' => ['role:Admin|User|Dosen','auth']],function()
{
    /* ----- Dashboard ------- */
    Route::get('dashboard/status_mahasiswa','DashboardController@StatusCollegeStudent');
    Route::get('dashboard/status_dosen','DashboardController@StatusLecturer');
    Route::resource('dashboard','DashboardController');
});
/* ------------ End Dashboard Roles Admin|User|Dosen ------------------- */

/* ---------- Start Roles User[mahasiswa] ---------- */
Route::group(['middleware' => ['role:User','auth']],function()
{
    /* ----- KRS ----- */
    Route::get('krs/data','KrsController@data')->name('krs.data');
    Route::get('krs/show','KrsController@showKrs');
    Route::get('krs/selesai','KrsController@krsFinished');
    Route::post('krs/check_code','KrsController@checkCode')->name('krs.check_code');
    Route::resource('krs','KrsController');

    /* ----------- KHS ------- */   
    Route::get('khs/pdf','KhsController@pdf');
    Route::resource('khs','KhsController');
});
/* ---------- End Roles User ---------- */

/* -------- Start Roles Dosen --------- */
Route::group(['middleware' => ['role:Dosen','auth']],function()
{
    /* ------ Jadwal Mengajar ------- */
    Route::get('jadwal-mengajar/data','TeachingScheduleController@data')->name('jadwalmengajar.data');
    Route::get('jadwal-mengajar/kehadiran/{id}','TeachingScheduleController@showPresence');
    Route::get('jadwal-mengajar/kehadiran/create/{id}','TeachingScheduleController@showFormInput');
    Route::get('jadwal-mengajar/kehadiran/input/show-attendence','TeachingScheduleController@showAttendence');
    Route::post('jadwal-mengajar/kehadiran/input-kehadiran','TeachingScheduleController@updatePresence');
    Route::resource('jadwal-mengajar','TeachingScheduleController');
});
/* -------- End Roles Dosen ---------- */