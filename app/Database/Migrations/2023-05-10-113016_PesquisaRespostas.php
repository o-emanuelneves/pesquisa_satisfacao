<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PesquisaRespostas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_resposta'         => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'        => true,
                'auto_increment' => true,
            ],
            'fk_pesquisa'         => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'        => true
            ],
            'fk_user'         => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'        => true
            ],
            'fk_pergunta'         => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'        => true
            ],
            'resposta'         => [
                'type'           => 'INT',
                'constraint'     => 1,
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
        $this->forge->addKey('id_resposta', true);
        $this->forge->addForeignKey('fk_pesquisa', 'pesquisas', 'id_pesquisa');
        $this->forge->addForeignKey('fk_user', 'auth_users', 'id_user');
        $this->forge->addForeignKey('fk_pergunta', 'pesquisa_perguntas', 'id_pergunta');
        $this->forge->createTable('pesquisa_respostas');
    }

    public function down()
    {
        $this->forge->dropTable('pesquisa_respostas');
    }
}
