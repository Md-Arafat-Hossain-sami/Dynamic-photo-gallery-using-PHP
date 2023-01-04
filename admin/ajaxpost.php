<?php
include('../connecton/connect.php');
        //   Get rows from images table
         
        function getRows(){ 
            $query = $this->db->query("SELECT * FROM ".`photos`." ORDER BY position_order ASC");
            if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
                    $result[] = $row; 
                }
            }else{ 
                $result = FALSE;
            } 
            return $result;
        } 
         
        /* 
         * Update image order 
         */ 
        function updateOrder($id_array){
            $count = 1;
            foreach ($id_array as $id){
                $update = $this->db->query("UPDATE ".`photos`." SET img_order = $count, modified = NOW() WHERE photo_id = $id");
                $count ++;
            } 
            return TRUE; 
        } 
?>