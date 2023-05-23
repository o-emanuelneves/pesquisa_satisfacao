<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PesquisaPerguntas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pergunta'         => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'        => true, 
                'auto_increment' => true,
            ],
            'fk_user'         => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'        => true
            ],
            'pergunta'             => [
                'type'      => "VARCHAR",
                'constraint' => 500

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
        $this->forge->addKey('id_pergunta', true);
        $this->forge->addForeignKey('fk_user', 'auth_users', 'id_user');
        $this->forge->createTable('pesquisa_perguntas');
       
    }

    public function down()
    {
        $this->forge->dropTable('pesquisa_perguntas');
    }
}
