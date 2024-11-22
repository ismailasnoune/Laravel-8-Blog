<?php

namespace Database\Seeders;

use App\Models\posts;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      posts::factory()->count(10)->create();
    }
}
