<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_admin
 *
 * @author Wael
 */
include_once 'Class_user.php';
include_once 'DbConnection.php';
class class_admin extends Class_user {
    
    public  function __construct($user_id="") {
        if($user_id!=""){
                    parent::__construct($user_id);
        }
        
    }
    public function show_All_users(){
        
         $db_object=new DbConnection();
         $select_user_SQL="SELECT * FROM `users`";
         $SQl_result= $db_object->database_query($select_user_SQL);
         $all_data=$db_object->database_all_array($SQl_result);
         return  $all_data;
    }
    
}
