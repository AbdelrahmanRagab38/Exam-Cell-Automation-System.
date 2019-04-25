<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbConnection
 *
 */
namespace DesignPatterns\Creational\Singleton;

final class DbConnection {
    
    private static $instance;

    
    
    
     private $host="localhost";
    private $username="root";
    private $password="";
    private $db_name="srms";//your database name 
    private  $database_connection; // 
    public function __construct() {
      $this->database_connection = $this->database_connect($this->host, $this->username,$this->password);
      $this->database_select($this->db_name);
    
    
     public static function getInstance(): Singleton
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }
    
    
    

    private function __construct() {
 $this->conn = new mysqli($servername, $username, $password);
    dbname={$this->name}", $this->user,$this->pass,"
  }
    }

    private function __clone() {

    }

/* to test the code
$firstdb = Product::getInstance();

$seconddb = Product::getInstance();

$firstdb->mix = 'test';

$seconddb->mix = 'example';
} */
    
   
      
    }
   public function getConnection()
  {
    return $this->conn;
  }

    
    private function database_connect($database_host, $database_username, $database_password) {
        if ($connection = mysqli_connect($database_host, $database_username, $database_password)) {
            return $connection;
            
        } else {
                die("Database connection error");
            
        }
    }
        /**
     * select a db
     *
\     * @return mysql link
     */
    private function database_select($database_name) {
        return mysqli_select_db($this->database_connection,$database_name)
            or die("No database is selecteted");
    }
        /**
     * Close db connection
     *
     */
    public   function database_close() {
        if(!mysqli_close($this->database_connection)) die ("Connection close failed.");
           
    }
   //Clean data that is used in SQL queries.
     function clean($str) {
		$str = trim($str); // remove 
                $str = stripslashes($str);
                $str = strip_tags($str);
		$str= mysqli_real_escape_string($this->database_connection,$str);
                return $str;
	}
       
   
 public function database_query($database_query) {
        $this->encode();
        $query_result = mysqli_query($this->database_connection,$database_query);
        return $query_result;
    }
        /**
     * Executes query and returns query result (row, array)
     *
     * @param string $query   SQL query text
     *         
     * @access public
     * @return associated array
     */
    
    
    public function get_row($query) {
        if (!strstr(strtoupper($query), "LIMIT"))
            $query .= " LIMIT 0,1";
            $res =$this->database_query($query);
        if (!$res) {
         die( "Database error: " . mysqli_error() . "<br/>In query: " . $query);
        }
        return mysqli_fetch_assoc($res);
    }
    
    public  function encode(){
        mysqli_query($this->database_connection,"SET NAMES utf8");
    }


    /**
     * Executes query result (table, array of array)
     *
     * @param string database_result
 
     * @access public
     * @return array of rows 
     */
    public function database_all_array($database_result) {
        $array_return=array();
        while ($row = mysqli_fetch_array($database_result)) {
            $array_return[] = $row;
        }
//        if(count($array_return)>0)
        return $array_return;

    }
    

            /**
     * Executes query result (table, array of array)
     *
     * @param string database_result
 
     * @access public
     * @return associated array of rows 
     */
   public function database_all_assoc($database_result) {
         $array_return=array();
        while ($row = mysqli_fetch_assoc($database_result)) {
            $array_return[] = $row;
        }
        return $array_return;
    }
        /**
     * Returns number of rows in the result
     *
     * @param mixed $database_result
     * @return integer
     */
      public   function database_affected_rows($database_result) {

        return mysqli_affected_rows(
                );
    }
    
    /**
     * Returns number of rows in the result
     *
     * @param mixed $database_result
     * @return integer
     */
     public   function database_num_rows($database_result) {

        return mysqli_num_rows($database_result);
    }
    
#-#############################################
# desc: does an update query with an array
# param: table, assoc array with data (not escaped), where condition (optional. if none given, all records updated)
# returns: (query_id) for fetching results etc
public function update($table, $data, $where='1'){
    $q="UPDATE `$table` SET ";

    foreach($data as $key=>$val){   
        if(strtolower($val)=='null') $q.= "`$key` = NULL, ";
        elseif(strtolower($val)=='now()') $q.= "`$key` =    (), ";
        //elseif(preg_match("/^increment\((\-?\d+)\)$/i",$val,$m)) $q.= "`$key` = `$key` + $m[1], "; 
        else $q.= "`$key`='".$this->clean($val)."', ";
    }

    $q = rtrim($q, ', ') . ' WHERE '.$where.';';
    echo $q;
    return $this->database_query($q);
}#-#update()


#-#############################################
# desc: does an insert query with an array
# param: table, assoc array with data (not escaped)
# returns: id of inserted record, false if error
public function insert($table, $data){
    $q="INSERT INTO `$table` ";
    $v=''; $n='';

    foreach($data as $key=>$val){
        $n.="`$key`, ";
        if(strtolower($val)=='null') $v.="NULL, ";
        elseif(strtolower($val)=='now()') $v.="NOW(), ";
        else $v.= "'".$this->clean($val)."', ";
    }

    $q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");";
   // echo $q;
    if($this->database_query($q)){
        return true;
    }
    else return false;

}#-#insert() +
    
} 



    

