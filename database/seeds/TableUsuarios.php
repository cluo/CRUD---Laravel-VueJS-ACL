<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class TableUsuarios extends Seeder
{

    public function run()
    {

        $usuarios = array(
            [
                'id' => '1',
                'name' => 'Admin',
                'password' => bcrypt('123456'),
                'email' => 'admin@admin.com'
            ],
            [
                'id' => '2',
                'name' => 'Autor',
                'password' => bcrypt('123456'),
                'email' => 'autor@autor.com'
            ]
        );
        
        foreach($usuarios as $key => $value){
            $usuario = User::create($value);
        }

        $usuario_role = User::find('1');
        $usuario_role->attachRole('1');

        $usuario_role = User::find('2');
        $usuario_role->attachRole('2');

    }
}
