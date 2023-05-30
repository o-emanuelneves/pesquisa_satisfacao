<?php

namespace App\Models;
use CodeIgniter\Model;
use Throwable;

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
        try {
            return $this->insert($dados);
            
            
        } catch (Throwable $e) {
            log_message('error', 'Erro ao inserir dados: ' . $e->getMessage());
            return false;
        }
    }
        
    

    public function excluir($id_user)
    {
        return $this->where('id_user', $id_user)->delete();
    }

    public function ver($id_user)
    {
        return $this->where('id_user', $id_user)->first();
    }

    public function get_usuario($nome){
   
        return  $this->where('nome', $nome)->first();

    }

}


?>