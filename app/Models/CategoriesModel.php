<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoriesModel extends Model {

    protected $table = 'categoria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nome'];

    public function getCategories($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insertCategoria($data) {            
        $insert = $this->insert($data);
        return $insert;
    }

    public function deleteCategoria($id) {
        $db = db_connect();
        $builder = $db->table('categoria');
        $builder->delete(['id' => intval($id)]);
    }

    public function updateCategoria($id = null, $data = null) {  
        $dataEditada = array(
            'nome' => $data['nome']
        );  
        $editado = $this->update($id, $dataEditada);
        if($editado) {
          true;
         } else {
            false;
        }
    }
}

?>