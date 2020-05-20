<?php

class Products_Model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_products()
    {
         return $this->db->get("products");
    }
    
    function get_all_products()
    {
        $sql = "SELECT codigo ,nombre, precio, active as activo from products p ORDER BY id asc;";
        $query = $this->db->query($sql);
       
        ## you must also add an statements here just in case the query return empty result
        #return($query->result());
        foreach ($query->result() as $row)
        {
            $data[] = array(
                       'id'=> 'row_'.$row->codigo,
                       'codigo' => $row->codigo,
                       'nombre' => $row->nombre,
                       'activo' => $row->activo,
                       'precio' => $row->precio
                  );  
        }
        
          return $data;
    }

    function check_Product($plu)
    {
        //var_dump($postData);
        //die();
    

        $sql = "SELECT codigo from products p where codigo='{$plu}';";
        $query = $this->db->query($sql);

        $count = $query->num_rows();
        $data=false;
        if($count>0){
            $data=true;
        }
        ## you must also add an statements here just in case the query return empty result
        #return($query->result());
       // foreach ($query->result() as $row)
       /*
       $row = $query->row();
       
            $data[] = array(
                'codigo' => $row->codigo,
                'nombre' => $row->nombre,
                'precio' => $row->precio
                );  
       */
    
          return $data;
    }

    function get_Product($plu)
    {
        //var_dump($postData);
        //die();
    

        $sql = "SELECT codigo, nombre, precio from products p where active=1 and codigo='{$plu}';";
        $query = $this->db->query($sql);
        ## you must also add an statements here just in case the query return empty result
        #return($query->result());
       // foreach ($query->result() as $row)
        $row = $query->row();
       
            $data[] = array(
                'codigo' => $row->codigo,
                'nombre' => $row->nombre,
                'precio' => $row->precio
                );  
       
    
          return $data;
    }

    function insert_entry($item)
    {
        $this->id   = $item['codigo']; // please read the below note
        $this->codigo = $item['codigo'];
        $this->nombre   = $item['nombre']; // please read the below note
        $this->precio = $item['precio'];
        
        $myresult = $this->db->insert('products', $this);
       
        $resp=false;

        if($myresult){
           $resp=true;
        }
        
        return $resp;
    }

    function update_entry($item)
    {
        $this->nombre   = $item['nombre'];
        $this->precio = $item['precio'];
        $this->active = $item['active'];
        //$this->content = $item['content'];
        //$this->date    = time();

       $this->db->update('products', $this, array('id' => $item['codigo']));
       $afftectedRows = $this->db->affected_rows();

       $resp=false;
       if($afftectedRows>0){
          $resp=true;
       }
       
       return $resp;
    }

}