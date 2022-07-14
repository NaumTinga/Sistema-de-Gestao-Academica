<?php


namespace Database\Seeders;

use App\Models\Docente;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docentes = Docente::Factory(50)->create();
    }
}
