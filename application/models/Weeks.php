<?php

class Weeks extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all_weeks()
    {
        $sql = "SELECT name,active, active_from_date, active_to_date from goals;";
        $query = $this->db->query($sql);
        ## you must also add an statements here just in case the query return empty result
        #return($query->result());
        foreach ($query->result() as $row)
        {
            $data[] = array(
					   'id' => $row->id,
                       'name' => $row->name,
                       'active' => $row->active,
                       'from' => $row->active_from_date,
                       'to' => $row->active_to_date
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
