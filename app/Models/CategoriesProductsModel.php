<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoriesProductsModel extends Model {

    protected $table = 'categoriaproduto';
    protected $allowedFields = ['categoria', 'produto'];

    public function getProducts($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }
    public function insertCategoriaProduto($data){   
        $insert = $this->insert($data);
        return $insert;
}

public function getCategoriesProducts($id_produto){
 $db = db_connect();
//$sql = "select categoriaproduto.categoria from categoriaproduto where produto=?";

//$results = $db->query($sql, [$id_produto]);
//return $results->getRowArray();
$builder = $db->table('categoriaproduto');
$query = $builder->select('categoriaproduto.categoria')
                 ->where('produto', $id_produto)
                ->get();

    return $query->getResult();
//$this->where('id', $id_produto);

// return $this->asArray()->where(['produto'=> $id_produto])->findAll(); 
// return $this->asArray()->where(['id' => $id])->first();
}

public function getProductsCategories($id_categoria){
    $db = db_connect();
   //$sql = "select categoriaproduto.categoria from categoriaproduto where produto=?";
   
   //$results = $db->query($sql, [$id_produto]);
   //return $results->getRowArray();
   $builder = $db->table('categoriaproduto');
   $query = $builder->select('categoriaproduto.produto')
                    ->where('categoria', $id_categoria)
                   ->get();
   
       return $query->getResult();
   //$this->where('id', $id_produto);
   
   // return $this->asArray()->where(['produto'=> $id_produto])->findAll(); 
   // return $this->asArray()->where(['id' => $id])->first();
   }

public function removeCategoriaProduto($id){
    $db = db_connect();
    $builder = $db->table('categoriaproduto');
    $builder->delete(['produto' => $id]);
}

public function removeProdutoCategoria($id){
    $db = db_connect();
    $builder = $db->table('categoriaproduto');
    $builder->delete(['categoria' => $id]);
}






}

?>