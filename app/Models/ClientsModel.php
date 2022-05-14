<?php

namespace App\Models;
use CodeIgniter\Model;

class ClientsModel extends Model {

    protected $table = 'usuario';
    protected $primaryKey = 'cpf';
    protected $allowedFields = ['cpf', 'email', 'nome'];

    public function getData(){
     return $this->findAll();
    }

    public function getClient($cpf){
        return $this->asArray()->where(['cpf' => $cpf])->first();
    }

    public function insertCliente($data) {            
        $insert = $this->insert($data);
        return $insert;
    }
   
    public function getCPF($nome){
       return $this->asArray()->where(['nome' => $nome])->first();
    }

    public function editarCliente($cpf = null, $data = null) {
        $editado = array(
            'nome' => $data['nome'],
            'email' => $data['email'],
        );
       $editado = $this->update($cpf, $editado);
       if($editado) { return true; } else { return false; }
    }

    public function deleteCliente($cpf) {
        $db = db_connect();
        $builder = $db->table('usuario');
        $builder->delete(['cpf' => intval($cpf)]);
    }

}

?>