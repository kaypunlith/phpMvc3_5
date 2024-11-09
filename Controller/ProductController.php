<?php 
   include("../Model/Product.php");
   include("../handle/Redirect.php");
  class ProductController{
       public function store($title,$qty,$price,$des,$image){
           $model=new Product();
           $model->title=$title;
           $model->qty=$qty;
           $model->price=$price;
           $model->des=$des;
           $model->image=$image;
           $model->Save();
           Redirect("main.php");
       }
       public function index(){
          $model=new Product();
           return $model->all();
       }
       public function distroy($id){
        $model=new Product();
        $model->setId($id);
        $model->delete_produt();
        header("Location:main.php");
        return Redirect("main.php");
       }
  }
?>