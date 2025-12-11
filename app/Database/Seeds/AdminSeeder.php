<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Ambil data rahasia dari file .env
        $email = getenv('ADMIN_EMAIL');
        $password = getenv('ADMIN_PASSWORD');

        // Untuk cek ENV
        if (empty($email) || empty($password)) {
            $email = 'admin@default.com';
            $password = 'admin123';
        }

        $data = [
            'name'      => 'Super Admin',
            'email'     => $email,
            'password'  => password_hash($password, PASSWORD_DEFAULT),
            'role'      => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
        ];


        $cek = $this->db->table('users')->where('email', $email)->get()->getRow();

        if (!$cek) {
            $this->db->table('users')->insert($data);
        }
    }
}
