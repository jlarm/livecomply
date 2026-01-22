<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

final class InitialUserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Joe Lohr',
            'email' => 'jlohr@autorisknow.com',
            'password' => bcrypt('password'),
            'role' => Role::ADMIN,
        ]);
    }
}
