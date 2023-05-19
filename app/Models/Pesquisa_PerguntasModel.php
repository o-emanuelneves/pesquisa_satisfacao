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

        $idsDelete = $service->idsDelete();
        $this->delete_perguntas($idsDelete);

        $update = $service->returnUpdate();
        $arrayInsert = $service->returnInsert();
        $merge = array_merge($update, $arrayInsert);

        // print_r($merge);exit;

         $this->insertBatch($merge);

        return true;
    }

    public function get_perguntas($columns = ['*']){
        $this->select($columns);
        return $this->find();
    }

    public function delete_perguntas($ids) {
        if (empty($ids)) return false;
        $this->whereIn('id_pergunta', $ids)->delete();
    } 
}
