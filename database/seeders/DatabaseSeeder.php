<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoDocumento;
use App\Models\User;
use App\Models\Client;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Christian Paul Navarro',
            'email' => 'christianpaul.76046734@gmail.com',
            'password'=> '$2y$12$hwMklSRETYk5LH0B10G8I.V4Z.VML60SD8MHQ/jWa60MjKMeEEd4a', //12345678
            'profile_photo_path'=> 'profile-photos/7wHjLNz58S3Y1ZBla1HIINWBcM40sBtSsWEqnH5d.jpg',
        ]);

        User::factory()->create([
            'name' => 'Paul Navarro',
            'email' => 'demo@demo.com',
            'password'=> '$2y$12$2hnNW8OqhJr0hHTOSCn5IuktvIvkQjYYxLcRnrnJKaLi9aHj/p2Pm', //12345678
            'profile_photo_path'=> null,
        ]);



        $tiposDocumentos = [
            ['name' => 'DNI'],
            ['name' => 'RUC'],
            ['name' => 'Pasaporte'],
            ['name' => 'Carnet de Extranjería'],
        ];

        foreach ($tiposDocumentos as $tipoDocumento) {
            TipoDocumento::create($tipoDocumento);
        }


        Client::factory(50)->create();

    }
}
