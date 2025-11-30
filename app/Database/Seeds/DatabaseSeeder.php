<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Panggil semua seeder bawahan disini
        $this->call('AdminSeeder');
        $this->call('News');
    }
}
