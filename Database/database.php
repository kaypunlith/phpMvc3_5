<?php 
   class database{
       protected $conn;
       public function __construct(Type $var = null) {
           $this->conn=mysqli_connect('localhost','root','','php_mvc');
       }
   }
?>