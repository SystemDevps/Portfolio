<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $education = [
            [
                'degree' => 'Ingeniería en Desarrollo y Gestión de Software',
                'institution' => 'Universidad Tecnológica de Tecamachalco',
                'location' => 'Tecamachalco, Puebla',
                'start_date' => '2020-09-01',
                'end_date' => '2021-12-01',
                'current' => false,
                'grade' => 'Promedio: 95',
                'description' => null,
                'sort_order' => 1,
            ],
            [
                'degree' => 'Técnico Superior Universitario',
                'institution' => 'Universidad Tecnológica de Tecamachalco',
                'location' => 'Tecamachalco, Puebla',
                'start_date' => '2018-08-01',
                'end_date' => '2020-07-01',
                'current' => false,
                'grade' => 'Promedio: 100',
                'description' => null,
                'sort_order' => 2,
            ],
            [
                'degree' => 'Soporte Correctivo y Preventivo Computacional',
                'institution' => 'Formación Técnica',
                'location' => 'Puebla',
                'start_date' => '2021-02-01',
                'end_date' => null,
                'current' => true,
                'grade' => null,
                'description' => 'Instalación de software (programas), soporte técnico y paquetería Office.',
                'sort_order' => 3,
            ],
            [
                'degree' => 'Cloud Computing',
                'institution' => 'Google Actívate',
                'location' => 'San Miguel Zacaola, Puebla',
                'start_date' => '2020-09-01',
                'end_date' => '2020-11-01',
                'current' => false,
                'grade' => 'Promedio: 100',
                'description' => null,
                'sort_order' => 4,
            ],
            [
                'degree' => 'Desarrollo de Apps Móviles',
                'institution' => 'Google Actívate',
                'location' => 'San Miguel Zacaola, Puebla',
                'start_date' => '2020-09-01',
                'end_date' => '2020-11-01',
                'current' => false,
                'grade' => 'Promedio: 100',
                'description' => null,
                'sort_order' => 5,
            ],
            [
                'degree' => 'Fundamentos de Marketing Digital',
                'institution' => 'Google Actívate',
                'location' => 'San Miguel Zacaola, Puebla',
                'start_date' => '2020-09-01',
                'end_date' => '2020-11-01',
                'current' => false,
                'grade' => 'Promedio: 100',
                'description' => null,
                'sort_order' => 6,
            ],
            [
                'degree' => 'Introducción al Desarrollo Web II',
                'institution' => 'Google Actívate',
                'location' => 'San Miguel Zacaola, Puebla',
                'start_date' => '2020-06-01',
                'end_date' => '2020-06-30',
                'current' => false,
                'grade' => 'Promedio: 100',
                'description' => null,
                'sort_order' => 7,
            ],
            [
                'degree' => 'Introducción al Desarrollo Web I',
                'institution' => 'Google Actívate',
                'location' => 'San Miguel Zacaola, Puebla',
                'start_date' => '2020-06-01',
                'end_date' => '2020-06-30',
                'current' => false,
                'grade' => 'Promedio: 100',
                'description' => null,
                'sort_order' => 8,
            ],
        ];

        foreach ($education as $edu) {
            Education::updateOrCreate(
                ['degree' => $edu['degree'], 'institution' => $edu['institution']],
                $edu
            );
        }
    }
}
