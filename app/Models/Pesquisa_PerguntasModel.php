<?php

namespace App\Models;

use CodeIgniter\Model;

class Pesquisa_PerguntasModel extends Model
{
    protected $table = 'pesquisa_perguntas';
    protected $primaryKey = 'id_pergunta';
    protected $allowedFields = [
        'pergunta',
        'fk_user',
        'id_pergunta'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
