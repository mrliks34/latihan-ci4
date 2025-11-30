<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDivisiToPegawai extends Migration
{
    public function up()
    {
        $fields = [
            'divisi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'Umum',
                'after'      => 'nama_pegawai'
            ],
        ];
        $this->forge->addColumn('pegawai', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('pegawai', 'divisi');
    }
}
