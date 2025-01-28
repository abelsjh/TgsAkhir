<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TimIbadah extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_tim' => [
                'type'           => 'CHAR',
                'constraint'     => 5,
                'auto_increment' => true,


            ],
            'nama_tim' => [
                'type'       => 'VARCHAR',
                'null'      => false,
                'constraint' => '50',

            ],

        ]);
        $this->forge->addKey('id_tim', true);
        $this->forge->createTable('tim_ibadah');


        $this->forge->addField([
            'id_role' => [
                'type'           => 'CHAR',
                'constraint'     => 5,
                'auto_increment' => true,


            ],
            'nama_role' => [
                'type'       => 'VARCHAR',
                'null'      => false,
                'constraint' => '50',

            ],

        ]);
        $this->forge->addKey('id_role', true);
        $this->forge->createTable('role_ibadah');

        $this->forge->addField([
            'id_anggota' => [
                'type'           => 'CHAR',
                'constraint'     => 5,
                'auto_increment' => true,


            ],
            'nama_anggota' => [
                'type'       => 'VARCHAR',
                'null'      => false,
                'constraint' => '50',

            ],

        ]);
        $this->forge->addKey('id_anggota', true);
        $this->forge->createTable('anggota_ibadah');

        $this->forge->addField([
            'id' => [
                'type'           => 'CHAR',
                'constraint'     => 5,
                'auto_increment' => true,


            ],
            'id_tim' => [
                'type'       => 'CHAR',
                'null'      => false,
                'constraint' => 5,

            ],
            'id_role' => [
                'type'       => 'CHAR',
                'null'      => false,
                'constraint' => 5,

            ],
            'id_anggota' => [
                'type'       => 'CHAR',
                'null'      => false,
                'constraint' => 5,

            ],


        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('listtim_ibadah');

        $this->forge->addForeignKey('id_tim', 'tim_ibadah', 'id_tim', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_role', 'role_ibadah', 'id_role', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_anggota', 'anggota_ibadah', 'id_anggota', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        //
        $this->forge->dropTable('tim_ibadah');
        $this->forge->dropTable('role_ibadah');
        $this->forge->dropTable('anggota_ibadah');
        $this->forge->dropTable('listtim_ibadah');
        $this->forge->dropForeignKey('listtim_ibadah', 'listtim_ibadah_id_tim_foreign');
        $this->forge->dropForeignKey('listtim_ibadah', 'listtim_ibadah_id_role_foreign');
        $this->forge->dropForeignKey('listtim_ibadah', 'listtim_ibadah_id_anggota_foreign');
    }
}
