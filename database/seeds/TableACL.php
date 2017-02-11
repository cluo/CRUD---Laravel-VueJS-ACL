<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class TableACL extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [

            // REGRAS DOS ESTADOS
            [
                'id' => '1',
                'name' => 'admin',
                'display_name' => 'Administrador',
                'description' => 'Administrador geral dos estados.'
            ],
            [
                'id' => '2',
                'name' => 'editor',
                'display_name' => 'Editor',
                'description' => 'Editor dos estados.'
            ]
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }

        $permission = [

            // REGRAS DOS ESTADOS
            [
                'id' => '1',
	            'name' => 'visualizar',
	            'display_name' => 'Visualizar',
	            'description' => 'Poderá ver somente os estados.'
            ],
            [
                'id' => '2',
	            'name' => 'criar',
	            'display_name' => 'Criar',
	            'description' => 'Poedrá criar um novo estado.'
            ],
            [
                'id' => '3',
	            'name' => 'editar',
	            'display_name' => 'Editar',
	            'description' => 'Poderá editar um estado.'
            ],
            [
                'id' => '4',
	            'name' => 'deletar',
	            'display_name' => 'Deletar',
	            'description' => 'Poderá deletar um estado.'
            ]
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }

        // SETA EDITAR SOMENTE PARA O AUTOR
        Role::find(2)->attachPermission(Permission::find(1));
        Role::find(2)->attachPermission(Permission::find(2));

    }
}
