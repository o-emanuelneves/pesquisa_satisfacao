<?php

namespace App\Models;
use CodeIgniter\Model;
 
class PesquisasModel extends Model{
    protected $table = 'pesquisas';
    protected $primaryKey = 'id_pesquisa';
    protected $allowedFields = [
        'fk_user',
        'id_pesquisa',
        'observacao'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
   

}
