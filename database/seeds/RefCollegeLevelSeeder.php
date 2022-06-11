<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefCollegeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ref_college_level')
        ->insert(
            [
                [
                    'name'          => 'D3',
                    'order'         => 1,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                ],
                [
                    'name'          => 'S1',
                    'order'         => 2,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                ],
                [
                    'name'          => 'S2',
                    'order'         => 3,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
