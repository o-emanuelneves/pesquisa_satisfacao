<?php

namespace App\Models;
use CodeIgniter\Model;
 
class AuthUserModel extends Model{
    protected $table = 'auth_users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'id_user',
        'nome'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    public function store()
    {
        $dados = $this->request->getVar();
        $this->insert($dados);
        return redirect()->to('../AuthUsers/index');
    }

    public function insert_user($dados){
        return $this->insert($dados);
    }

    public function excluir($id_user)
    {
        return $this->where('id_user', $id_user)->delete();
    }

    public function ver($id_user)
    {
        return $this->where('id_user', $id_user)->first();
    }

}


?>