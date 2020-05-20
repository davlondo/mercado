<?php

class Goals extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all_goals()
    {
        $sql = "SELECT id,name,active, active_from_date as 'starting', active_to_date as 'ending' from goals;";
        $query = $this->db->query($sql);
        ## you must also add an statements here just in case the query return empty result
        #return($query->result());
        foreach ($query->result() as $row)
        {
            $data[] = array(
					   'id' => $row->id,
                       'name' => $row->name,
                       'active' => $row->active,
                       'starting' => $row->starting,
                       'ending' => $row->ending
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
