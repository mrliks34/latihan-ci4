<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class News extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'author' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'Malik',
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['published', 'draft'],
                'default'    => 'draft',
            ],
            'created_at' => [
                'type'      => 'DATETIME',
                'default'   => new RawSql('current_timestamp'),
            ]
            
        ]);

        $this->forge->addKey('id', true);


        $this->forge->createTable('news', true);
    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
