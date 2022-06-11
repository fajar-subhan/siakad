<?php

use Illuminate\Database\Seeder;
use App\Models\M_MenuMaster;

class MenuMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        M_MenuMaster::create([
            'name'      => 'Dashboard',
            'icon_id'   => 1,
            'route_type'=> 'URI',
            'route'     => '/Dashboard',
            'active'    => 1,
            'order'     => 1,
            'created_by'=> 1,
            'updated_by'=> 1
        ]);
    }
}
