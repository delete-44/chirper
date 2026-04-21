<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChirpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::count() < 3 ?
            collect([
                User::create([
                    'name' => 'eddie <3',
                    'email' => 'eddie+1@example.com',
                    'password' => bcrypt('password')
                ]),
                User::create([
                    'name' => 'Alice Developer',
                    'email' => 'alice@example.com',
                    'password' => bcrypt('password'),
                ]),
                User::create([
                    'name' => 'Slamdunk Johnson',
                    'email' => 'slamdunk@example.com',
                    'password' => bcrypt('password'),
                ]),
            ])
            : User::take(3)->get();

        $chirps = [
            "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",
            "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.",
            "Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in literature, discovered the undoubtable source.",
            "The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc."
        ];

        foreach ($chirps as $message) {
            $users->random()->chirps()->create([
                'message' => $message,
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}
