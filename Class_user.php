<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Class_user
 *
 */
include_once 'DbConnection.php';
class Class_user {
    private $id;
    private $username;
    private $password;
    public  $first_name;
    public  $last_name;
    private $user_type_id;
    public $email;
    private $Db_object;
    public function get_id(){
        return $this->id;
    }
    public function set_id($id){
        $this->id=$id;
    }
      public function get_username(){
        return $this->username;
    }
    public function set_username($username){
        $this->username=$username;
    }
    public function set_password($password){
        $this->password=$password;
    }
       public function get_password(){
        return $this->password;
    }
    public function set_user_type($type){
        $this->id=$type;
    }
       public function get_user_type(){
        return $this->user_type_id;
    }
    public function __construct($user_id="") {
        $this->Db_object=new DbConnection();
        if($user_id !=""){
                    $Db_object=new DbConnection();
                    $select_user_SQL="SELECT * FROM `users`  where id=$user_id";
                    $data=$this->Db_object->get_row($select_user_SQL);
                    $this->id=$data['id'];
                    $this->username=$data['username'];
                    $this->password=$data['password'];
                    $this->first_name=$data['fname'];
                    $this->last_name=$data['lname'];
                    $this->email=$data['email'];
                    $this->user_type_id=$data['user_type_id'];
        }
         
    }
    public function  login(){
        
        
        $this->username=$this->Db_object->clean($this->username);
        $this->password=$this->Db_object->clean($this->password);
        // echo $this->username;
        $select_user_SQL="SELECT * FROM `users`  where username='$this->username' and password='$this->password'";
        
        $select_user_Result=$this->Db_object->database_query($select_user_SQL);
        
        if($this->Db_object->database_num_rows($select_user_Result)==1){
                 $user_data=$this->Db_object->get_row($select_user_SQL);
                 $this->id=$user_data['id'];
                  return TRUE;
                
                       }
          else{
              
           return FALSE;
           
             }
       

    }
    
    
    
}
