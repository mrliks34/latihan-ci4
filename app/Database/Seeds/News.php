<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class News extends Seeder
{
    public function run()
    {
        $news_data = [
            [
                'title'     => 'Selamat datang di CodeIgniter',
                'slug'      => 'codeigniter-intro',
                'content'   => 'Pengenalan CodeIgniter untuk pemula.',
                'status'    => 'published',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title'     => 'Hello World',
                'slug'      => 'Hello-World',
                'content'   => 'Hello World, ini contoh artikel',
                'status'    => 'published',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title'     => 'Meetup komunitas codeigniter',
                'slug'      => 'codeigniter-meetup',
                'content'   => 'Seru sekali meetup perdana komunitas codeigniter .....',
                'status'    => 'published',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        foreach ($news_data as $data) {
            $this->db->table('news')->insert($data);
        }
    }
}
