<?php

  include_once 'customers_crud.php';
  include("auth.php");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>All About Tennis : Customers</title>
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
    <h2><font face="Cooper Black" color="#663399">Create New Customers</font></h2>
  </div>
    <form action="customers.php" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="customerid" class="col-sm-3 control-label"><font face="Segoe Print">ID</font></label>
        <div class="col-sm-9">
        <input type="text" required id="customerid" class="form-control" name="cid" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_num']; ?>" placeholder="Customer ID" >
        </div>
     </div> 

    <div class="form-group">
         <label for="customername" class="col-sm-3 control-label"><font face="Segoe Print">Name</font></label>
         <div class="col-sm-9">
         <input type="text" required id="customername" class="form-control" name="name" placeholder="Customer Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_name']; ?>">
         </div>
    </div>

    <div class="form-group">
        <label for="customerphone" class="col-sm-3 control-label"><font face="Segoe Print">Phone Number</font></label>
        <div class="col-sm-9">
        <input name="phone" type="text" class="form-control" id="customerphone" placeholder="XXX-XXXXXXX" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_phone']; ?>" required> 
        </div>
      </div>

    
    <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldcid" value="<?php echo $editrow['fld_customer_num']; ?>">
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
    <h2><font face="Cooper Black" color="#663399">Customer List</font></h2>
  </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
       <thead>
      <tr>
        <th>Customer ID</th>
        <th>Name</th>
         <th>Phone Number</th>
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
          $stmt = $conn->prepare("SELECT * FROM tbl_customers_a180970_pt2 LIMIT $start_form, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
       <td><?php echo $readrow['fld_customer_num']; ?></td>
        <td><?php echo $readrow['fld_customer_name']; ?></td>
        <td><?php echo $readrow['fld_customer_phone']; ?></td>
        <td>
          <center>
          <a href="customers.php?edit=<?php echo $readrow['fld_customer_num']; ?>" class="btn btn-success btn-xs" role="button"><font face="Consolas">Edit</font></a>
          <a href="customers.php?delete=<?php echo $readrow['fld_customer_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button"><font face="Consolas">Delete</font></a>
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
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_customers_a180970_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="customers.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"customers.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"customers.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="customers.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
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