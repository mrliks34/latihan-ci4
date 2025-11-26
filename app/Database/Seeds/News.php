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
                'content'   => 'Pengenalan CodeIgniter untuk pemula.'
            ],
            [
                'title'     => 'Hello World',
                'slug'      => 'Hello-World',
                'content'   => 'Hello World, ini contoh artikel'
            ],
            [
                'title'     => 'Meetup komunitas codeigniter',
                'slug'      => 'codeigniter-meetup',
                'content'   => 'Seru sekali meetup perdana komunitas codeigniter .....'
            ]
            ];

            foreach($news_data as $data){
                $this->db->table('news')->insert($data);
            }
    }
}
