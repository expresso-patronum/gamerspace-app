<?php

namespace App\Models;
use CodeIgniter\Model;

class ClientsProductsModel extends Model {

    protected $table = 'usuarioproduto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'usuario', 'produto'];

    public function getData($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['produto' => $id])->first();
    }

    public function removeClienteProduto($cpf){
        $db = db_connect();
        $builder = $db->table('usuarioproduto');
        $builder->delete(['usuario' => $cpf]);
    }

    public function getProdutosDoUsuario($usuario){
        $db = db_connect();
        //return $this->asArray()->where(['usuario' => $usuario])->first();
        $builder = $db->table('produto');
$builder->select('*');
$builder->join('usuarioproduto', 'usuarioproduto.produto = produto.id');
$builder->where('usuarioproduto.usuario', $usuario);
$query = $builder->get();
return $query->getResultArray();
    }




    public function cadastrarUsuarioProdutoToDB($idProduto, $cpfUsuario, $quantidade){
        $data = array(
            'usuario' => $cpfUsuario,
            'produto' => $idProduto
        );


        $insert = $this->insert($data);
        return $insert;
    }
}

?>