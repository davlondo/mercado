<?php

class Gifts extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all_gifts()
    {
        $sql = "SELECT g.id id,name,description as infor,image_url,if(available is null,0,available) as qty from gifts g left join inventory i on g.id = i.item_id where active=1 ORDER BY ordering asc;";
        $query = $this->db->query($sql);
        ## you must also add an statements here just in case the query return empty result
        #return($query->result());
        foreach ($query->result() as $row)
        {
            $data[] = array(
                       'id' => $row->id,
                       'name' => $row->name,
                       'infor' => $row->infor,
                       'image_url' => $row->image_url,
                       'qty' => $row->qty
                  );  
        }
          return $data;
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}