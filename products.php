<?php

  include_once 'products_crud.php';
  include("auth.php");
  $_SESSION['position1'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>All About Tennis : Products</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">  
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>

<body style="background-color: #FFF0F5">
<link href="style.css" rel="stylesheet">

  <?php include_once 'nav_bar.php'; ?>

<div class="container-fluid">
<div class="row">
 
<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
    <div class="page-header">  <br>
    <h2><font face="Cooper Black" color="#663399">Create New Products</font></h2>
  </div>
    <form action="products.php" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="productid" class="col-sm-3 control-label"><font face="Segoe Print">ID</font></label>
        <div class="col-sm-9">
        <input type="text" required id="productid" class="form-control" name="pid" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>" placeholder="Product ID" >
        </div>
     </div> 

    <div class="form-group">
         <label for="productname" class="col-sm-3 control-label"><font face="Segoe Print">Name</font></label>
         <div class="col-sm-9">
         <input type="text" required id="productname" class="form-control" name="name" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>">
         </div>
    </div>

    <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label"><font face="Segoe Print">Price (RM)</font></label>
          <div class="col-sm-9">
          <input type="text" required id="productprice" class="form-control" name="price" placeholder="Product Price in RM" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>">
          </div>
    </div>

    <div class="form-group">
          <label for="productbrand" class="col-sm-3 control-label"><font face="Segoe Print">Brand</font></label>
          <div class="col-sm-9">
          <select name="brand" class="form-control" id="productbrand" required>
            <option value="">Please select</option>
            <option value="Wilson" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Wilson") echo "selected"; ?>>Wilson</option>
            <option value="HEAD" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="HEAD") echo "selected"; ?>>HEAD</option>
            <option value="Babolat" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Babolat") echo "selected"; ?>>Babolat</option>
            <option value="Prince" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Prince") echo "selected"; ?>>Prince</option>
            <option value="YONEX" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="YONEX") echo "selected"; ?>>YONEX</option>
            <option value="Dunlop" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Dunlop") echo "selected"; ?>>Dunlop</option>
            <option value="Nike" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Nike") echo "selected"; ?>>Nike</option>
            <option value="Adidas" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Adidas") echo "selected"; ?>>Adidas</option>
          </select>
        </div>
        </div>

        <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label"><font face="Segoe Print">Type</font></label>
          <div class="col-sm-9">
          <select name="type" class="form-control" id="producttype" required>
            <option value="">Please select</option>
            <option value="Ball" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Ball") echo "selected"; ?>>Ball</option>
            <option value="Bag" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Bag") echo "selected"; ?>>Bag</option>
            <option value="Racquet" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Racquet") echo "selected"; ?>>Racquet</option>
            <option value="Shoes" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Shoes") echo "selected"; ?>>Shoes</option>
            <option value="Grip Tape" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Grip Tape") echo "selected"; ?>>Grip Tape</option>
            <option value="Hat" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Hat") echo "selected"; ?>>Hat</option>
            <option value="Net" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Net") echo "selected"; ?>>Net</option>
            <option value="Hooper" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Hooper") echo "selected"; ?>>Hooper</option>
          </select>
        </div>
        </div>   

      <div class="form-group">
          <label for="productq" class="col-sm-3 control-label"><font face="Segoe Print">Quantity</font></label>
          <div class="col-sm-9">
          <input name="quantity" type="number" class="form-control" id="productq" placeholder="Product Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_quantity']; ?>"  min="0" required>
        </div>
        </div>

      <div class="form-group">
          <label for="productdesc" class="col-sm-3 control-label"><font face="Segoe Print">Description</font></label>
          <div class="col-sm-9">
          <input name="description" type="text" class="form-control" id="productdesc" placeholder="Product Description" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_description']; ?>" required>
        </div>
        </div>

         
    <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
      <button type="submit" name="update" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><font face="Forte">Update</font></button>
      <?php } else { ?>
      
      <button type="submit" name="create" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span><font face="Forte">Create</font></button>
      <?php } ?>
      
      <button type="reset" class="btn btn-default"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span><font face="Forte">Clear</font></button>
    </div>
  </div>

    </form>
    </div>
  </div>

      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
          <div class="page-header"><br>
    <h2><font face="Cooper Black" color="#663399">Product List</font></h2>
  </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
       <thead>
      <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Price (RM)</th>
        <th>Brand</th>
        <th>Type</th>
        <th></th>
      </tr>
    </thead>

     <tbody>
        <?php
      // Read
         $per_page = 45;
            if(isset($_GET["page"]))
              $page = $_GET["page"];
            else
              $page = 1;
            $start_form = ($page-1) * $per_page;

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT *, FORMAT(fld_product_price,2) FROM tbl_products_a180970_pt2 LIMIT $start_form, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
       <td><?php echo $readrow['fld_product_num']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['FORMAT(fld_product_price,2)']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_type']; ?></td>
        <td>
          <center>
          <a href="javascript:void(0);" data-href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-warning btn-xs openBtn3" role="button"><font face="Consolas">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>"  class="btn btn-success btn-xs" role="button"><font face="Consolas">Edit</font></a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button"><font face="Consolas">Delete</font></a>
          </center>
          </td>
      </tr>
      <?php
      }
    
      ?>
    </tbody>
 
    </table>
</div>
      </div>
      
      <!--
      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
          <nav>
            <ul class="pagination">
              <?php
              try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM tbl_products_a178858_pt2");
                $stmt->execute();
                $result = $stmt->fetchAll();
                $total_records = count($result);
              } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
              }
              $total_pages = ceil($total_records / $per_page);
              
              if ($page == 1) {?>
              <li class="disabled"><span aria-hidden="true"><<</span></li>
              <?php }else{ ?>
              <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden = "true"><<</span></a></li>
              <?php
              }
              for ($i=1; $i <= $total_pages ; $i++) {
                if ($i == $page) {
                  echo "<li class= \"active\"><a href=\"products.php?page=$i\">$i</a></li>";
                }
                else
                  echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
              }
              if ($page == $total_pages) { ?>
              <li class="disabled"><span aria-hidden="true">>></span></li>
              
              <?php } else{ ?>
              <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden = "true">>></span></a></li>
              <?php } ?>
            </ul>
          </nav>
        </div>
        
      </div>
    </div>-->

    <ul>
  <br \>
  <br \><br \>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product Details</h4>
        </div>
        <div class="modal-body" id="productdetails">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script> 

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<!-- <script src="./js/app.js"></script>  -->

<script>
      //Load content from external file
      $(document).ready(function(){
        $('.openBtn3').on('click',function(){
          var dataURL = $(this).attr('data-href');
          $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
          });
        });
      });
    </script> 
<!-- 
    <script>
      //Load content from external file
      $('.openBtn2').on('click',function(){
        $('.modal-body').load('products_details.php?pid=<?php echo $readrow['fld_product_num']; ?> ',function(){
          $('#myModal').modal({show:true});
        });
      });
    </script> 
  -->
  <script>  
   $(document).ready(function () {
    $('#example').DataTable({
      lengthMenu: [
      [5, 10, 20, 30,  -1],
      [5, 10, 20, 30,  'All'],
      ],
    });
  });
</script>

</body>
</html>