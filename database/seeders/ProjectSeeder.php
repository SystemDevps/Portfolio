<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Sistema de Roles y Permisos',
                'slug' => 'sistema-roles-permisos',
                'description' => 'Sistema web completo con gestión de roles y permisos, registro de usuarios, módulo de alta y baja de personal, validación de cuenta y correo electrónico, y sistema de subida y descarga de documentos. Desarrollado con Laravel.',
                'technologies' => 'Laravel,MySQL,HTML5,CSS,JavaScript',
                'demo_url' => null,
                'github_url' => 'https://github.com/ALBERTH-CMD',
                'completed_at' => '2020-08-01',
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Aplicación Web con Login y Roles (Laravel 7.x)',
                'slug' => 'app-web-login-roles-laravel7',
                'description' => 'Aplicación web desarrollada para Proessa Consultoría Alimentaria con integración de login y roles en Laravel 7.x. Incluye documentación completa: reportes de creación de base de datos, reporte de hosting y dominios, y despliegue en hosting con dominio.',
                'technologies' => 'Laravel 7.x,MySQL,HTML5,CSS',
                'demo_url' => null,
                'github_url' => 'https://github.com/ALBERTH-CMD',
                'completed_at' => '2020-08-01',
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Sistema de Gestión de Actas y Documentación',
                'slug' => 'sistema-gestion-actas-documentacion',
                'description' => 'Sistema de gestión de actas y documentación por zonas desarrollado en colaboración para la Comisión Federal de Electricidad. (Detalles confidenciales por políticas de la empresa).',
                'technologies' => 'Laravel,MySQL',
                'demo_url' => null,
                'github_url' => null,
                'completed_at' => '2022-07-01',
                'featured' => false,
                'sort_order' => 3,
            ],
        ];

        foreach ($projects as $proj) {
            Project::updateOrCreate(
                ['slug' => $proj['slug']],
                $proj
            );
        }
    }
}
