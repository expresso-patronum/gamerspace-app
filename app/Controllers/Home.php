<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomersModel;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;
use App\Models\CategoriesProductsModel;
use App\Models\ClientsProductsModel;
use App\Models\ClientsModel;
class Home extends BaseController
{
	// I defined session variable in BaseController.php provided by Codeigniter. See code. 
	
	public function index()

	{   
		$products_model = new ProductsModel();
		$categories_model = new CategoriesModel();
		$categorias= $categories_model-> getCategories();
		$data = $products_model->getProducts();
		$produtos= $data;
		echo view ('home', ['data'=>$produtos, 'categorias'=>$categorias]);
	}
	public function getDados(){
		//$session = \Config\Services::session();
		$products_model = new ProductsModel();
		$categories_model = new CategoriesModel();
		$categorias= $categories_model-> getCategories();
		$data = $products_model->getProducts();
		$produtos= $data;
		//echo $produtos;
		//$data['orders'] = $orders_model->getOrdersbyCustomer($data['id']);
        echo view ('home', ['data'=>$produtos, 'categorias'=>$categorias]);
		}

		public function filtrar(){
			$categoriesproducts_model = new CategoriesProductsModel();
			$categories_model = new CategoriesModel();
		$categorias= $categories_model-> getCategories();
		$products_model = new ProductsModel();
			$data = array(

				'filtro' => $this->request->getVar('categoriaFiltro')

			);
			$produtosBanco= $categoriesproducts_model->getProductsCategories(intval($data['filtro']));
			/*$produto=array();

	foreach($produtosBanco["produto"] as $key => $value){
	
array_push($produto,  (int)$value->produto);
	}	
			 echo view('home', ['data'=>$produtos, 'categorias'=>$categorias]);
		*/
	if($produtosBanco== NULL){
		echo view('home', ['data'=>[], 'categorias'=>$categorias]);
	} else{
		$produtoFinal= array();

	for($i=0; $i<count($produtosBanco); $i++){
		foreach($produtosBanco[strval($i)] as $key => $value){
		$produtoo= $products_model->getProducts($value);
			array_push($produtoFinal, $produtoo);
			//var_dump($produtoo);
			
				}	

			}
		
				echo view('home', ['data'=>$produtoFinal, 'categorias'=>$categorias]);
			}
			}



			public function pesquisar() {
				$categoriesproducts_model = new CategoriesProductsModel();
				$categories_model = new CategoriesModel();
			    $categorias= $categories_model-> getCategories();
			    $products_model = new ProductsModel();
				$data = array(
					'pesquisa' => $this->request->getVar('pesquisa'),
				);
				//var_dump($data['pesquisa']);
				$produtos = $products_model->getProducts();
				$produtosBanco = $products_model->getProductsSearch( $data['pesquisa']);
				echo view('home', ['data'=>$produtosBanco, 'categorias'=>$categorias]);
			}


	public function mostraCadastro()

	{   
		return view('cadastroCliente');
	}

	public function cadastrarClienteToDB() {
		$clients_model = new ClientsModel();
			$data = array(

				'nome' => $this->request->getVar('nome'),
				
				'cpf' => $this->request->getVar('cpf'),

				'email' => $this->request->getVar('email'),

			);

			 $clients_model->insertCliente($data);
			return redirect()->to(base_url('/'));
		
			//$this->cadastrarProdutoToDB($product_model);	
	}



	


	public function registration()
	{
		echo view ('common/headerRegister');
		echo view ('formRegister');
		echo view ('common/footer');
	}


		public function descricaoDoProduto($id){
			$categories_model = new CategoriesModel();
			$categoriesproducts_model = new CategoriesProductsModel();
			$product_model = new ProductsModel();
			$data = array(
				'id' => $this->request->getVar('produto'),
			);
			
			$id_produto = $id;
			
	//		$idDasCategorias = $categoriesproducts_model->getCategoriesProducts($id_produto);
	$datas["categorias"] =$categoriesproducts_model->getCategoriesProducts($id_produto);
	//var_dump($datas["categorias"]);
	$IdcategoriasDoProdutoFinal=array();
	$ArrayCategoriasFinal = array();

	foreach($datas["categorias"] as $key => $value){
	
array_push($IdcategoriasDoProdutoFinal,  (int)$value->categoria);
	}	

			for($i=0; $i<count($IdcategoriasDoProdutoFinal); $i++){
	$data2 = $categories_model->getCategories($IdcategoriasDoProdutoFinal[$i]);
	array_push($ArrayCategoriasFinal, $data2["nome"]);
	
}


$result = $product_model->getProducts($id_produto);
echo view ('detalharProduto', ['categorias'=>$ArrayCategoriasFinal, 'produto'=> $result]);

}//ump($idDasCategorias->getResult());
			//foreach ($idDasCategorias->getResultArray() as $row) {
		//		var_dump($row["categoria"]);
		//	}
          //var_dump($idDasCategorias[0]->categoria->string(1));
			//$categorias= $categories_model->getCategories($idDasCategorias);
			//echo $categorias;

		public function cadastrarProduto(){
			//$data['customer_id'] = $id;
			$categories_model = new CategoriesModel();
		    $data = $categories_model->getCategories();
			echo view ('formCadastrarProduto', ['categorias'=>$data]);
		}

		public function updateCategoria(){
			echo view ('updateCategoria');
		}

		public function updateCategoriaToDB($id = null){
			$categories_model = new CategoriesModel();
				$data = array(
					'nome' => $this->request->getVar('nome'),
				);

				 $editado = $categories_model->updateCategoria($id, $data);
				
				 return redirect()->to(base_url('/categorias'));
		}


		public function cadastroCategoria(){
			echo view ('cadastroCategoria');
		}

		public function cadastroCategoriaToDB() {
			$categories_model = new CategoriesModel();
			$data = array(
				'nome' => $this->request->getVar('nome'),
			);
			$result = $categories_model->insertCategoria($data);
			return redirect()->to(base_url('/categorias'));
		}


		public function deleteProduto($id) {
		$product_model = new ProductsModel();
			$categoriesproducts_model = new CategoriesProductsModel();
			$categoriesproducts_model->removeCategoriaProduto($id);
			$product_model->deleteProduto($id);
			return redirect()->to(base_url('/'));
		}

		public function deleteCliente($cpf) {
			$client_model = new ClientsModel();
				$clientsproducts_model = new ClientsProductsModel();
				$clientsproducts_model->removeClienteProduto($cpf);
				$client_model->deleteCliente($cpf);
				return redirect()->to(base_url('/'));
			}
	

		public function deleteCategoria($id) {
			$categories_model = new CategoriesModel();
				$categoriesproducts_model = new CategoriesProductsModel();
				$categoriesproducts_model->removeProdutoCategoria($id);
				$categories_model->deleteCategoria($id);
				return redirect()->to(base_url('/categorias'));
			}




		public function editarProduto($id){
			//$data['customer_id'] = $id;
			$categories_model = new CategoriesModel();
		    $data1 = $categories_model->getCategories();
			$product_model = new ProductsModel();
			$data = array(

				'nome' => $this->request->getVar('nome'),
	
				'descricao' => $this->request->getVar('descricao'),
				
				'tipo' => $this->request->getVar('tipo'),

				'sistema' => $this->request->getVar('sistema'),

				'quantidade' => (int)$this->request->getVar('quantidade'),

				'preco' => (float)$this->request->getVar('preco'),

				'url' => $this->request->getVar('url'),
			);
			$id_produto = $id;
///			var_dump($id_produto);
$result = $product_model->getProduct($id_produto);

			echo view ('formEditarProduto', ['data'=>$result, 'categorias'=>$data1]);
		}

		public function cadastrarProdutoToDB() {
			$product_model = new ProductsModel();
			$categoriesproducts_model = new CategoriesProductsModel();
				$data = array(

					'nome' => $this->request->getVar('nome'),
	
					'descricao' => $this->request->getVar('descricao'),
					
					'tipo' => $this->request->getVar('tipo'),

					'sistema' => $this->request->getVar('sistema'),

					'quantidade' => (int)$this->request->getVar('quantidade'),

					'preco' => (float)$this->request->getVar('preco'),

					'url' => $this->request->getVar('url'),

				);

				 $result = $product_model->insertProduto($data);

				 $categorias = array();

				for($i=0; $i<300; $i++){ //numero maximo de categorias eh 300
					if(null!==$this->request->getVar(strval($i))){
					array_push($categorias,  $this->request->getVar(strval($i)));
				}
			}

				 for($i=0; $i<count($categorias); $i++){
					$data2 = array(
						'categoria'=> intval($categorias[$i]),
						'produto' => intval($result)
					
					);
   
					$categoriesproducts_model->insertCategoriaProduto($data2);
			   }
				   

			  
				
				return redirect()->to(base_url('/'));
				
			
				//$this->cadastrarProdutoToDB($product_model);	
		}


public function cadastrarUsuarioProduto($id){
	$client_model = new ClientsModel();
	$clientsproducts_model = new ClientsProductsModel();
	$product_model = new ProductsModel();
	$data = array(
		'nome' => $this->request->getVar('nome'),
		'quantidade' => $this->request->getVar('quantidade')
	);

	var_dump($data['quantidade']);

	$dados= $client_model->getCPF($data['nome']);
	if($dados!==NULL){
	$cpf= $dados['cpf'];
	$qt = intval($data['quantidade']);

	$quantidadeDisponivel = $product_model->getQuantidadeDisponivel($id);

	if(intval($quantidadeDisponivel)>=intval($data['quantidade'])){
		while($qt--) {
		$clientsproducts_model->cadastrarUsuarioProdutoToDB( $id,$cpf, $data['quantidade']);
		$product_model->updateQuantidade($id, $quantidadeDisponivel, $data['quantidade']);
	} 
		return redirect()->to(base_url('/'));
	
	} else{
		if($quantidadeDisponivel==0){
		echo "Esse produto não está mais disponível";
		}
		if($quantidadeDisponivel>0){
			echo "Você quer comprar mais desse produto do que temos em estoque";
		}
	}
	
		
} else{
		 echo 'O usuário não existe.';
	}
   

}

public function mostraClientes(){
	$client_model = new ClientsModel();
	$clientes = $client_model->getData();
echo view ('/clientes', ['clientes'=>$clientes]);
}

public function mostraRankings(){	
	$product_model = new ProductsModel();
	$clientsproducts_model= new ClientsProductsModel();

$maiorQtd =	$product_model->getProdutoDeMaiorQtd();
$maisCaro = 	$product_model->getProdutoMaisCaro();
echo view ('/rankings', ['maiorQtd'=> $maiorQtd[0], 'maisCaro'=>$maisCaro[0]]);
}


public function editarCliente($cpf = null) {
	$client_model = new ClientsModel();
	$data = array(
		//'cpf'=> $this->request->getVar('id'),

		'nome' => $this->request->getVar('nome'),

		'email' => $this->request->getVar('email'),
	);

$editado = $client_model->editarCliente($cpf, $data);
if($editado) { return redirect()->to(base_url('/clientes')); } else { throw new \Exception('Erro'); }
}

public function mostraEditarCliente($cpf = null) {
	$client_model = new ClientsModel();
	$data = $client_model->getClient($cpf);
	return view('formEditarCliente', $data);
}

public function mostraCategorias(){
	$categories_model = new CategoriesModel();
	$categorias = $categories_model->getCategories();
echo view ('/categorias', ['categorias'=>$categorias]);
}

public function descricaoDoCliente($cpf){
	$client_model = new ClientsModel();
	$clientsproducts_model = new ClientsProductsModel();
	$product_model = new ProductsModel();
	$data = array(
		'cpf' => $cpf,
	);

	$dataProduto = array(
		'id' => $this->request->getVar('id'),
		'nome' => $this->request->getVar('nome'),
	);
	$id_produto = $dataProduto['id'];
	$cpf_cliente = $data['cpf'];
$produtosDoCliente = $clientsproducts_model->getProdutosDoUsuario($cpf_cliente);
$cliente = $client_model->getClient($cpf_cliente);
echo view ('descricaoDoCliente', ['cliente'=>$cliente, 'produtos'=>$produtosDoCliente]);
}






		public function updateProdutoToDB($id) {
			$product_model = new ProductsModel();
			$categoriesproducts_model = new CategoriesProductsModel();
				$data = array(
            'nome' => $this->request->getVar('nome'),
	
					'descricao' => $this->request->getVar('descricao'),
					
					'tipo' => $this->request->getVar('tipo'),

					'sistema' => $this->request->getVar('sistema'),

					'quantidade' => $this->request->getVar('quantidade'),

					'preco' => $this->request->getVar('preco'),

					'url' => $this->request->getVar('url'),

				);

				 $editado = $product_model->updateProduto($id, $data);
				
				$categorias = array();

				for($i=0; $i<300; $i++){ //numero maximo de categorias eh 300
					if(null!==$this->request->getVar(strval($i))){
					array_push($categorias,  $this->request->getVar(strval($i)));
				}
			}
   $categoriesproducts_model->removeCategoriaProduto($id);
				
				      for($i=0; $i<count($categorias); $i++){
				 $data2 = array(
					'categoria'=> intval($categorias[$i]),
					'produto' => intval($id)
				
				);

				 $categoriesproducts_model->insertCategoriaProduto($data2);
			}
				
				 return redirect()->to(base_url('/'));
				
			
				//$this->cadastrarProdutoToDB($product_model);	
		}
	
	
/*
	public function editOrder($id){
		$orders_model = new OrdersModel();
		$result = $orders_model->getData($id);
		$data = $result;
		
		echo view ('common/headerUser');
		echo view ('editOrderView',$data);
		echo view ('common/footer');
	}


	public function editOrderToDB($id){
		$rules = [
			'description' => 'required|min_length[3]|max_length[255]',
			'amount' => 'required', 
		];// revisar

		$orders_model = new OrdersModel();

		if ($this->validate($rules)){
			$data = array(

				'customer_id' =>  $this->request->getVar('customerIDform'),

				'description' => $this->request->getVar('description'),
				
				'amount' => $this->request->getVar('amount'),


			);
			

			$orders_model->update_order($id, $data);
 			return redirect()->to(base_url('customersession'));
			
		}
		else{
			$this->editOrder($id);	
					
		}

	}

	



	public function removeOrder($id=null){
		
		if ($id==null){
			return redirect()->to('customersession');
		}

		$orders_model = new OrdersModel();

		$result = $orders_model->getData($id);

		if ($result !=NULL){
			$orders_model->removeOrder($result['id']);		
			return redirect()->to(base_url('customersession'));
			
		}else{
			return redirect()->to(base_url('customersession'));
		}


	} 


	public function insertData(){

		// Codeigniter 3: $this->load->model("CustomersModel");
		$customers_model = new CustomersModel();
		// Codeigniter 3: $this->load->library("session");
//		$session = \Config\Services::session();

		// codeignter 3 : $this->input->post("...");
			$data = array(


				'name' => $this->request->getVar('name'),
				
				'email' => $this->request->getVar('email'),

				'passwd' => md5($this->request->getVar('passwd'))

			);

			$customers_model->insert_data_login($data);
			$this->session->setFlashdata('messageRegisterOk',' Registered Successfull. Please, login.' );
			return redirect()->to('/');
			
	
			$this->registration();	
				
		


	} 



*/

	//--------------------------------------------------------------------

}
