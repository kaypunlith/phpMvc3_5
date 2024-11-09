<?php include("./components/header.php")?>
<?php include("../handle/Model.php")?>
<div class="container">
<div class="d-flex justify-content-between">
          <h3>view product</h3>
          <a href="create.php" class="btn btn-success">create product</a>
        </div>
       <table class="table shadow p-4 mt-3 table-hover align-middle">
           <thead>
              <tr>
                <th>Code</th>
                <th>Image</th>
                <th>Title</th>
                <th>Qty</th>
                <th>price</th>
                <th>Action</th>
              </tr>
           </thead>
           <tbody>
              <?php 
                    include("../Controller/ProductController.php");
                    $control=new ProductController();
                    $allproduct=$control->index();
                    foreach($allproduct as $pro){
                       ?>
                           <tr>
                            <td><?php echo $pro['productCode']?></td>
                            <td><img src="../public/image/<?php echo $pro['productImage']?>" width="66" height="60"></td>
                            <td><?php echo $pro['productTitle']?></td>
                            <td><?php echo $pro['productQty']?></td>
                            <td><?php echo $pro['productPrice']?>$</td>
                            <td>
                                <button class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger" onclick="Delete_prodcut(<?php echo $pro['productCode']?>)" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                            </td>
                        </tr>
                       <?php
                    }
              ?>
               <?php 
                           if(isset($_POST['delete_id'])){
                               $control=new ProductController();
                               $delete_id=$_POST['pro_del'];
                               $control->distroy($delete_id);

                           }
                ?>
           
           </tbody>
       </table>
</div>
<?php include("./components/footer.php")?>