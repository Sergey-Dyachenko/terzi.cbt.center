<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'phone' => '7(495)123-456-78',
            'city' => 'Kiev',
            'company' => 'ЦБТ',
            'comments' => 'Вебинар Богдан Терзи',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ] );
        //
    }
}
