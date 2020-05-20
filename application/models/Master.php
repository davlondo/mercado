<?php

class master extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all_contacts()
    {
        $sql = "SELECT date,name,email, address, phone, comments, comment_type from contact order by date desc;";
        $query = $this->db->query($sql);
        ## you must also add an statements here just in case the query return empty result
        #return($query->result());
        foreach ($query->result() as $row)
        {
            $data[] = array(
					   'date' => $row->date,
                       'name' => $row->name,
                       'email' => $row->email,
                       'address' => $row->address,
                       'phone' => $row->phone,
                       'comments' => $row->comments,
                       'comment_type' => $row->comment_type
                  );  
        }
          return $data;
    }

        function get_all_orders()
    {
        $sql = "select 
                o.order_date fecha,
                g.name regalo,
                concat(p.`name`,' ',p.`last_name`) cliente,
                ci.`address` direccion,
                ci.phone fijo,
                ci.`district` distrito,
                ci.`cellphone` movil,
                ci.email
                from orders o
                join gifts g on o.`item_id`=g.`id`
                join customer_info ci on ci.`order_id` = o.`id`
                join preload p on p.`id_mask` = ci.`customer_id`
                order by order_date desc";
        $query = $this->db->query($sql);
        ## you must also add an statements here just in case the query return empty result
        #return($query->result());
        foreach ($query->result() as $row)
        {
            $data[] = array(
                       'fecha' => $row->fecha,
                       'regalo' => $row->regalo,
                       'cliente' => $row->cliente,
                       'address' => $row->direccion,
                       'phone' => $row->fijo,
                       'distrito' => $row->distrito,
                       'movil' => $row->movil,
                       'email' => $row->email
                  );  
        }
          return $data;
    }

            function get_all_surveys()
    {
        $sql = "select 
                s.date fecha,
                concat(p.`name`,' ',p.`last_name`) cliente,
                s.score
                from survey s
                join preload p on p.`id_mask` = s.`customer_id`
                order by date desc";
        $query = $this->db->query($sql);
        ## you must also add an statements here just in case the query return empty result
        #return($query->result());
        foreach ($query->result() as $row)
        {
            $data[] = array(
                       'fecha' => $row->fecha,
                       'cliente' => $row->cliente,
                       'califica' => $row->score
                  );  
        }
          return $data;
    }

        function get_inventory()
    {
        $sql = "select
                g.id as item,
                g.name name,
                i.total,
                i.used,
                i.available
                from inventory i
                join gifts g on i.item_id = g.id";
        $query = $this->db->query($sql);
        ## you must also add an statements here just in case the query return empty result
        #return($query->result());
        foreach ($query->result() as $row)
        {
            $data[] = array(
                       'item' => $row->item,
                       'name' => $row->name,
                       'total' => $row->total,
                       'used' => $row->used,
                       'available' => $row->available
                  );  
        }
          return $data;
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}
