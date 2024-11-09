<?php 
  include("../Database/database.php");
  class Product extends database{
      private $code;
      public $title;
      public $qty;
      public $price;
      public $des;
      public $image;
      public function setId($id){
          if($id>0){
            $this->code=$id;
          }
       
      }
      public function Save(){
        $sql = "INSERT INTO `crud_mvc1` (`code`, `title`, `qty`, `price`, `des`, `image`) 
                VALUES (null, '{$this->title}', '{$this->qty}', '{$this->price}', '{$this->des}', '{$this->image}')";
        mysqli_query($this->conn, $sql);
    }
    function all(){
      $sql="SELECT * FROM `crud_mvc1` ORDER BY `code` DESC";
      $result=mysqli_query($this->conn,$sql);
      $data=[];
      while($row=$result->fetch_array()){
          $data[]=[
              "productCode"=>$row[0],
              "productTitle"=>$row[1],
              "productQty"=>$row[2],
              "productPrice"=>$row[3],
              "productDes"=>$row[4],
              "productImage"=>$row[5]
          ];
          
      }
      return $data;
    }
    function delete_produt(){
        $sql="DELETE FROM `crud_mvc1` WHERE `code`={$this->code}";
        mysqli_query($this->conn,$sql);
    }
    
  }
?>