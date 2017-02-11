<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(TableACL::class);
        $this->call(TableUsuarios::class);
        $this->call(TableEstados::class);

    }
}
