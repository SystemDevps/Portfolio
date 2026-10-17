<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'job_title' => 'Encargado de Subasta',
                'company' => 'Giro de Legumbres',
                'location' => 'Huixcolotla, Puebla',
                'start_date' => '2024-03-01',
                'end_date' => '2026-05-01',
                'current' => false,
                'description' => 'Horario: 5:00 am - 4:00 pm, Lunes a Domingo. Actividades: llegar y anotar y cobrar las unidades (vehículos) que llegaban e ingresaban a vender su producto de apio, cebollín, betabel, brócoli y todo producto de legumbres. Realizar recorridos espontáneos para mantener el orden y dar indicaciones a los vendedores ambulantes de no ingresar, de lo contrario se sancionaban; al igual estar al pendiente del personal de vialidad.',
                'sort_order' => 1,
            ],
            [
                'job_title' => 'Líder de Proyecto',
                'company' => 'Comisión Federal de Electricidad',
                'location' => 'Yucatán',
                'start_date' => '2022-04-01',
                'end_date' => '2023-05-01',
                'current' => false,
                'description' => 'Participación en el desarrollo de Sistema de Gestión de Actas y Documentación por zonas, durante tres meses. Desarrollo de un sistema de gestión de actas en colaboración con equipo de trabajo. (Por motivos de privacidad de la empresa no se permiten dar a conocer más detalles).',
                'sort_order' => 2,
            ],
            [
                'job_title' => 'Líder de Proyecto',
                'company' => 'Proessa Consultoría Alimentaria S.A. de C.V.',
                'location' => 'Tecamachalco, Puebla',
                'start_date' => '2020-05-01',
                'end_date' => '2020-08-01',
                'current' => false,
                'description' => 'Desarrollo de una aplicación web con integración de login y roles en el framework Laravel 7.x. Realización de documentación: reportes de creación de base de datos, reporte de hosting y dominios, subida de aplicación a un hosting con dominio.',
                'sort_order' => 3,
            ],
            [
                'job_title' => 'Líder de Desarrollo Web',
                'company' => 'SystemDevelopersCompany',
                'location' => 'San Miguel Zacaola, Puebla',
                'start_date' => '2020-05-01',
                'end_date' => '2020-08-01',
                'current' => false,
                'description' => 'Desarrollo de sistema de roles y permisos: dar acceso y negar acceso a diversos usuarios, registro de usuarios, módulo de alta y baja de personal, validar cuenta y correo electrónico en sistema, subir documentos y descarga de los mismos.',
                'sort_order' => 4,
            ],
        ];

        foreach ($experiences as $exp) {
            Experience::updateOrCreate(
                ['job_title' => $exp['job_title'], 'company' => $exp['company']],
                $exp
            );
        }
    }
}
