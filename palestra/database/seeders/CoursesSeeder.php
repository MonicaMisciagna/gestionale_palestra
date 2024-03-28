<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Courses::create([
            'name' => 'Yoga',
            'description' => 'Sessioni di yoga per tutti i livelli di esperienza.',
            'type_of_training' => 'Fisico e mentale',
            'url_image' => 'https://www.fitpalestre.it/wp-content/uploads/2020/07/benefici-allenamento-funzionale-scaled.jpg',
        ]);

        Courses::create([
            'name' => 'Pilates',
            'description' => 'Allenamento di Pilates per rafforzare il core e migliorare la postura.',
            'type_of_training' => 'Fisico',
            'url_image' => 'https://www.fitpalestre.it/wp-content/uploads/2020/07/benefici-allenamento-funzionale-scaled.jpg',
        ]);
        Courses::create([
            'name' => 'Zumba',
            'description' => 'Classe di Zumba per un allenamento divertente e ad alto ritmo.',
            'type_of_training' => 'Cardio',
            'url_image' => 'https://www.fitpalestre.it/wp-content/uploads/2020/07/benefici-allenamento-funzionale-scaled.jpg',
        ]);

        Courses::create([
            'name' => 'CrossFit',
            'description' => 'Allenamento ad alta intensità per migliorare la forza e la resistenza.',
            'type_of_training' => 'Forza',
            'url_image' => 'https://www.fitpalestre.it/wp-content/uploads/2020/07/benefici-allenamento-funzionale-scaled.jpg',
        ]);

        // Aggiungi altri corsi se necessario
        Courses::create([
            'name' => 'Pugilato',
            'description' => 'Allenamento di pugilato per migliorare la resistenza e la forza.',
            'type_of_training' => 'Fitness',
            'url_image' => 'https://www.fitpalestre.it/wp-content/uploads/2020/07/benefici-allenamento-funzionale-scaled.jpg',
        ]);

        Courses::create([
            'name' => 'Fitness Total',
            'description' => 'Classe di fitness completo per migliorare la forma fisica generale.',
            'type_of_training' => 'Fitness',
            'url_image' => 'https://www.fitpalestre.it/wp-content/uploads/2020/07/benefici-allenamento-funzionale-scaled.jpg',
        ]);
    }
}
