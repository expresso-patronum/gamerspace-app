<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductsModel extends Model {

    protected $table = 'produto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'descricao', 'tipo', 'sistema', 'quantidade', 'preco', 'url'];

    public function getProducts($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

public function updateQuantidade($id, $antigaQuantidade, $quantidadeQueVaiComprar){
    $db = db_connect();
    $novaQuantidade= intval($antigaQuantidade) - intval($quantidadeQueVaiComprar);
    $builder = $db->table('produto');
    $builder->set('quantidade', $novaQuantidade);
    $builder->where('id', $id);
    $builder->update();
}
    public function  getQuantidadeDisponivel($id){
      $result= $this->asArray()->where(['id' => $id])->first();
    return $result['quantidade'];
    }
    public function getProduct($id){
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function getName($id) {
        $result = $this->asArray()->where(['id' => $id])->first();
        return $result['nome'];
    }
    public function getProductsSearch($nome) {
        $db = db_connect();
      //  $this->$db->select('*');
      //  $this->$db->from('produto');
       // $this->$db->like('Mochila');
       $builder = $db->table('produto');
      $query = $builder->like('nome', $nome)->get()->getResultArray();
  
        /* $builder = $db->table('produto');
        $builder->select('*');
        $builder->from('produto');*/
 
return $query;   
}
    
public function getProdutoDeMaiorQtd(){
    $sql = "SELECT * FROM produto where produto.quantidade = (select max(quantidade) from produto);";
    $db = db_connect();
    //  $this->$db->select('*');
    //  $this->$db->from('produto');
     // $this->$db->like('Mochila');
     $builder = $db->table('produto');
   $result= $db->query($sql)->getResultArray();
   return $result;
}

public function getProdutoMaisCaro(){
    $sql = "SELECT * FROM produto where produto.preco = (select max(preco) from produto);";
    $db = db_connect();
    //  $this->$db->select('*');
    //  $this->$db->from('produto');
     // $this->$db->like('Mochila');
     $builder = $db->table('produto');
   $result= $db->query($sql)->getResultArray();
   return $result;
}

    public function insertProduto($data) {            
        $insert = $this->insert($data);
       // $produto_id = $insert->getInsertID();
        //$db = db_connect(); 
        //$query = $db->query('SELECT MAX(id) FROM produto');
        //$result = $query->getResultArray();
        return $insert;
    }

    public function deleteProduto($id) {
        $db = db_connect();
        $builder = $db->table('produto');
        $builder->delete(['id' => intval($id)]);
      //  $delete = $this->delete(['id' => $id]);
       // return $delete;
    }

    public function updateProduto($id, $data) {  
        $editado = array(
            'id' => $id,
            'nome' => $data['nome'],
            'descricao' => $data['descricao'],
            'tipo' => $data['tipo'],
            'sistema' => $data['sistema'],
            'quantidade' => $data['quantidade'],
            'preco' => $data['preco'],
            'url' => $data['url'],
        );  
        if($editado) {
       // $update = $this->replace($data); }
       $db = db_connect();
       $builder = $db->table('produto');

$builder->set($editado);
$builder->where('id', $editado['id']);
$builder->update();
         } else {
            throw new \Exception("Erro");
        }
       // $produto_id = $insert->getInsertID();
        //$db = db_connect(); 
        //$query = $db->query('SELECT MAX(id) FROM produto');
        //$result = $query->getResultArray()
    }
}

?>