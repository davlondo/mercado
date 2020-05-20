<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct(){
       
        parent::__construct();
    
        // Load Model
        $this->load->model('Products_Model');
    
        // Load base_url
        $this->load->helper('url');
      }

	public function index()
	{
		
    }
    
    public function createProduct(){
        // POST data
        $postData = $this->input->post();
        $fullData = $postData;
        $oldCode = $fullData['codigo'];
        $sku = str_ireplace("row_", "", $oldCode);
       
        $created['status']=false;
        $created['existing']=false;
        $created['error']=false;

        $beforeCreateProduct = $this->Products_Model->check_Product($sku);

        if(!$beforeCreateProduct){

            $creating['codigo'] = $sku;
            $creating['nombre'] = $fullData['nombre'];
            $creating['precio'] = $fullData['precio'];
            $createProduct = $this->Products_Model->insert_entry($creating);

            if($createProduct){
                $created['status']=true;
            }else{
                $created['error']=true; 
            }
        }else{
            $created['existing']=true;
        }
        //var_dump($created);
        //die;
        echo json_encode($created);
    }

    public function updateProduct(){
        // POST data
        $postData = $this->input->post();
        $fullData = $postData;
        $oldCode = $fullData['codigo'];
        $sku = str_ireplace("row_", "", $oldCode);
        $updating['codigo'] = $sku;
        //$updating['codigo'] = '-10';
        $updating['nombre'] = $fullData['nombre'];
        $updating['precio'] = $fullData['precio'];
        if($fullData['activo']=='false'){
            $updating['active'] = intval(0);
        }else{
            $updating['active'] = intval(1);
        }
        //$updating['active'] = $fullData['activo'];
        
        $updateProduct = $this->Products_Model->update_entry($updating);
       // var_dump($updateProduct);
        //die;
        $updated=false;
        if($updateProduct){
           $updated=true;
        }
        echo json_encode($updated);
    }
    
    public function getAllProducts(){
      

        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $dataFormatted = $this->Products_Model->get_products();

        $data = Array();
        $values = Array();

        foreach($dataFormatted->result() as $r) {

            if($r->active=='1'){
                $rowActivo='<input type="checkbox" name="activo_row_'.$r->codigo.'" id="activo_row_'.$r->codigo.'" value="S" checked disabled>';
            }else{
                $rowActivo='<input type="checkbox" name="activo_row_'.$r->codigo.'" id="activo_row_'.$r->codigo.'" value="N" disabled>';
            }

            $values[] = array(
               
                
                'codigo'=> $r->codigo,
                'nombre'=> $r->nombre,
                'precio'=>$r->precio,
                'activo'=>$rowActivo,
                'editar'=> '<span class="glyphicon glyphicon-edit"></span>',
                'DT_RowId'=>'row_'.$r->codigo
             
             );  
             array_push($data, $values);

        }

        $newData = $values;

        $output = array(
             "draw" => $draw,
             
               "recordsTotal" => $dataFormatted->num_rows(),
               "recordsFiltered" => $dataFormatted->num_rows(),
               "data" => $newData
          );
        echo json_encode($output);
        exit();
    }

    public function getProductDetails(){
        // POST data
        $postData = $this->input->post();
        $proceedManual=false;
        $fullSearch = strtoupper($postData['codigo']);

        $selectSplit   = 'P';
        $codeToSplit = strtoupper($fullSearch);
        $checkManual = strripos($codeToSplit, $selectSplit);
        
        //var_dump($codeToSplit);
        //var_dump($checkManual);
                
        if ($checkManual === false) {
            $separate = explode("X", $fullSearch);
            
        }else{
            $separate = explode("P", $fullSearch);
            $proceedManual=true;
        }
        //var_dump($separate);
        //die;
        $quantity= $separate[0];
        $code= $separate[1];

        
        //var_dump($postData);
        //die;
        if(!$proceedManual){
            $dataFormatted = $this->Products_Model->get_Product($code);
           // var_dump($dataFormatted);
           // die;
            if($dataFormatted){
                $data[] = array(
                    'codigo' => $dataFormatted[0]['codigo'],
                    'nombre' =>  $dataFormatted[0]['nombre'],
                    'precio' =>  $dataFormatted[0]['precio'],
                    'cantidades'=> $quantity,
                    'precioXCant'=> $dataFormatted[0]['precio'] * $quantity,
                    'estado' => '200'
                    );  
            }else{
                $data[] = array(
                    'codigo' => '',
                    'nombre' =>  '',
                    'precio' => '',
                    'cantidades'=>'',
                    'precioXCant'=> '',
                    'estado' => '404'
                    );  
            }
           
        }else{
            $data[] = array(
                'codigo' => 'manual',
                'nombre' => 'Manual',
                'precio' => $code,
                'cantidades'=> $quantity,
                'precioXCant'=> ($code * $quantity),
                'estado' => '200'
                );  
        }
    
        // get data
        
    
        echo json_encode($data);
	
	
	}



}
