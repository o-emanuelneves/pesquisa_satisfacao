<?php

namespace App\Models;
use CodeIgniter\Model;
 
class Auth_UserModel extends Model{
    protected $table = 'auth_users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'id_user',
        'nome'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

}


?>