<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::updateOrCreate(
            ['email' => 'GomezAlbertOlivares@gmail.com'],
            [
                'full_name' => 'José Alberto Gómez Olivares',
                'title' => 'Desarrollador Web Full Stack | Laravel',
                'bio' => 'Profesionista con aptitudes positivas y con mentalidad innovadora diaria, con amplio conocimiento en nuevas eras de tecnología como son frameworks más demandados en el área de producción y desarrollo web a largo y corto plazo. Especializado en Laravel (desde la versión 4.2 hasta las versiones más actuales), con experiencia en desarrollo de sistemas con roles y permisos, gestión de documentación, y despliegue en producción.',
                'email' => 'GomezAlbertOlivares@gmail.com',
                'phone' => '2491751003',
                'phone_alt' => '+52 2491859583',
                'address' => 'Priv. 3 Oriente # 14',
                'city' => 'San Miguel Zacaola',
                'state' => 'Puebla',
                'country' => 'México',
                'postal_code' => '75290',
                'birth_date' => '1997-05-17',
                'nationality' => 'Mexicano',
                'marital_status' => 'Unión Libre',
                'github_url' => 'https://github.com/ALBERTH-CMD',
                'linkedin_url' => 'https://www.linkedin.com/in/jos%C3%A9-alberto-gomez-olivares-5265681b0',
                'website_url' => null,
                'languages' => 'Español,Inglés',
                'photo_path' => null,
            ]
        );
    }
}
