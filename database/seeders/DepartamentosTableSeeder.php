<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creación de seeders pra la tabla departament
        $departamento=[
            'Ahuachapán',
            'Cabañas',
            'Chalatenango',
            'Cuscatlán',
            'La Libertad',
            'La Paz',
            'La Unión',
            'Morazán',
            'Santa Ana',
            'San Miguel',
            'San Salvador',
            'San Vicente',
            'Sonsonate',
            'Usulután',
        ];
        foreach ($departamentos as $departamento){
            Departamento::create(['nombre'=>$departamento]);
        }
    }
}
