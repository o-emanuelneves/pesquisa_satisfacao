<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'         => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'        => true, 
                'auto_increment' => true
            ],
            'nome'             => [
                'type'      => "VARCHAR",
                'constraint' => 128

            ],
            'created_at'       => [
                'type'        => 'DATETIME'
            ],
            'updated_at'      => [
                'type'        => 'DATETIME'
            ],
            'deleted_at'      => [
                'type'        => 'DATETIME'
            ]
        ]);
    $this->forge->addKey('id_user', true); 
    $this->forge->createTable('auth_users');

        
    }

    public function down()
    {
        $this->forge->dropTable('auth_users');
    }
}
