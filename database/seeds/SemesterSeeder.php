<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =1;$i < 9;$i++)
        {
            DB::table('ref_semester')->insert(
                [
                    'name'      => "Semester $i",
                    'active'    => 1,
                    'order'     => $i,
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at'=> date('Y-m-d H:i:s')
                ]
                );
        }
    }
}
