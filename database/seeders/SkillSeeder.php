<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            // Backend
            ['name' => 'PHP', 'category' => 'Backend', 'level' => 90, 'sort_order' => 1],
            ['name' => 'Framework Laravel', 'category' => 'Backend', 'level' => 95, 'sort_order' => 2],
            ['name' => 'Framework Django', 'category' => 'Backend', 'level' => 70, 'sort_order' => 3],
            ['name' => 'Desarrollo Web Backend', 'category' => 'Backend', 'level' => 90, 'sort_order' => 4],

            // Frontend
            ['name' => 'HTML5', 'category' => 'Frontend', 'level' => 95, 'sort_order' => 1],
            ['name' => 'CSS', 'category' => 'Frontend', 'level' => 90, 'sort_order' => 2],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'level' => 85, 'sort_order' => 3],
            ['name' => 'Desarrollo Web Frontend', 'category' => 'Frontend', 'level' => 90, 'sort_order' => 4],

            // Base de Datos
            ['name' => 'MySQL', 'category' => 'Base de Datos', 'level' => 90, 'sort_order' => 1],
            ['name' => 'Diseño de Base de Datos', 'category' => 'Base de Datos', 'level' => 90, 'sort_order' => 2],
            ['name' => 'Modelado de Base de Datos', 'category' => 'Base de Datos', 'level' => 85, 'sort_order' => 3],

            // Herramientas
            ['name' => 'Git / GitHub', 'category' => 'Herramientas', 'level' => 85, 'sort_order' => 1],
            ['name' => 'BitBucket', 'category' => 'Herramientas', 'level' => 75, 'sort_order' => 2],
            ['name' => 'Postman', 'category' => 'Herramientas', 'level' => 80, 'sort_order' => 3],
            ['name' => 'Cloud Computing', 'category' => 'Herramientas', 'level' => 75, 'sort_order' => 4],
            ['name' => 'Paquetería Office', 'category' => 'Herramientas', 'level' => 90, 'sort_order' => 5],

            // Sistemas Operativos
            ['name' => 'Ubuntu 25.04', 'category' => 'Sistemas Operativos', 'level' => 85, 'sort_order' => 1],
            ['name' => 'Windows 11', 'category' => 'Sistemas Operativos', 'level' => 90, 'sort_order' => 2],

            // Otros
            ['name' => 'Desarrollo Móvil', 'category' => 'Otros', 'level' => 70, 'sort_order' => 1],
            ['name' => 'Desarrollo de Software Multiplataforma', 'category' => 'Otros', 'level' => 80, 'sort_order' => 2],
            ['name' => 'Soporte Técnico', 'category' => 'Otros', 'level' => 85, 'sort_order' => 3],
            ['name' => 'Instalación de Software', 'category' => 'Otros', 'level' => 90, 'sort_order' => 4],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name']],
                $skill
            );
        }
    }
}
