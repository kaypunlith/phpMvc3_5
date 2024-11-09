  <?php include("./components/header.php")?>
      <div class="container shadow p-3">
      <div class="d-flex justify-content-between">
          <h3>create product</h3>
          <a href="main.php" class="btn btn-success">View product</a>
        </div>
            <form action="" method="POST" class="mt-2 " enctype="multipart/form-data">
                   <label for="" class="form-label">Title</label>
                   <input type="text" class="form-control" name="title" placeholder="Enter Title">
                   <label for="" class="form-label">Qty</label>
                   <input type="text" class="form-control" name="qty" placeholder="Enter Qty">
                   <label for="" class="form-label">Price</label>
                   <input type="text" class="form-control" name="price" placeholder="Enter price">
                   <label for="" class="form-label" >description</label>
                   <input type="text" class="form-control" name="description" placeholder="Enter description">
                   <label for="" class="form-label" >Image</label>
                   <input type="file" name="image" class="form-control">
                     <div class="mt-2">
                     <!-- <button class="btn btn-primary" name="create">Create</button> -->
                      <input type="submit" class="btn btn-primary" name="create" value="create">
                     <button class="btn btn-danger">Cencel</button>
                     </div>
            </form>
              <?php 
               if(isset($_POST['create'])){     
                  include("../Controller/ProductController.php");
                  $prodcut=new ProductController();
                  //find data from form
                  $title=$_POST['title'];
                  $qty=$_POST['qty'];
                  $price=$_POST['price'];
                  $image_name=$_FILES['image']['name'];
                  $image_tmp=$_FILES['image']['tmp_name'];
                  $image_dir="../public/image/$image_name";
                  $des=$_POST['description'];
                  move_uploaded_file($image_tmp,$image_dir);
                  if(empty($title) && empty($qty) && empty($price) && empty($des) && empty($image_name)){
                     header("Location.create.php");
                  }else{
                    $prodcut->store($title,$qty,$price,$des,$image_name);
                  }
                  
               }
            ?>
           
      </div>
    
<?php include("./components/footer.php")?>dir