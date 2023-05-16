<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Services\Pesquisa\PerguntasSrvc;

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

    public function set_perguntas($dados) {
        if (!$dados) return false;

        $dadosDb = $this->get_perguntas();
        $service = new PerguntasSrvc($dados, $dadosDb);
        $array = $service->returnInsert();
        
        $this->insertBatch($array);
        return true;
    }

    public function get_perguntas(){
        return $this->find();
    }

    
}
