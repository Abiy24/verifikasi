<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Abiy',
            'email' => 'abi@example.com',
            'neighborhood_association' =>'001',
            'dasa_wisma'=>'Utama',
            'coupon_number'=>'999',
            'taken_at'=>now(),
            'is_admin' =>true,
        ]);
        User::factory(100)->create();
    }
}
