<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\M_StatusPresence;

class statusPresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        M_StatusPresence::insert( 
            [
                [
                    'name'          => 'Hadir',
                    'desc'          => 'H',
                    'active'        => 1,
                    'order'         => 1,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                ],
                [
                    'name'          => 'Izin',
                    'desc'          => 'I',
                    'active'        => 1,
                    'order'         => 2,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                ],
                [
                    'name'          => 'Tidak Hadir',
                    'desc'          => 'A',
                    'active'        => 1,
                    'order'         => 3,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                ],
                [
                    'name'          => 'Sakit',
                    'desc'          => 'S',
                    'active'        => 1,
                    'order'         => 4,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
