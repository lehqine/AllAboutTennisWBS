<?php
include("auth.php"); 
include_once 'database.php'; 
include_once 'nav_bar.php';
?>
<!DOCTYPE html>
<html>
<head>
<style>
   .row.equal {
    display: flex;
    flex-wrap: wrap;
  }

    body{
    margin:0;
    background-color: #FFFFFF;
     background-image: url("bg3.jpg") ;
        background-size: 100%;
  }

    .row::after {
      content: "";
      clear: both;
      display: table;
    }

    
    .thumbnail:hover {
        background: #f7f7f7;
         object-fit: cover;
    }

    .thumbnail {           
        object-fit: cover;
        width : 98%;
        height: 275px;
        overflow: auto;
    }

</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All About Tennis : Search</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    
<?php include_once 'nav_bar.php'; ?>
    <div class="container-fluid">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
    <div class="page-header">
        <h1>Search Form</h1>
        <h5>You can search the product by Name. (e.g: tennis ball)</h5>
    </div>
    <form action="search.php" method="post" class="form-horizontal">
        <div class="form-group">
        <div class="col-sm-9">
        <input name="keyword" type="text" class="form-control" id="filter" placeholder="Search" required>
        </div>
        <button class="btn btn-primary" name="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
        </div>
    </form>
</div>
</div>
<?php
    try {
        $conn = new PDO("mysql:host=$servername; dbname=$dbname" , $username, $password);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e -> getMessage();
        }

        if(isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $mkeyword = explode(" ", $keyword);
            $conditions = '';
            foreach($mkeyword as $word){
                $conditions .= "fld_product_name LIKE '%$word%' OR fld_product_price LIKE '%$word%' OR ";
            }
            $conditions = substr($conditions, 0, -4);
            $stmt = $conn -> prepare("SELECT * FROM tbl_products_a180970_pt2 WHERE $conditions");
            $stmt -> execute();
            $result = $stmt -> fetchAll();            
            if ($stmt->rowCount()>0) {?>
              <div class="row equal">
              <?php foreach($result as $readrow) { ?>
              <div class="col-sm-3 col-lg-3 col-md-3">
              <div class="thumbnail" height="80px">
              <?php if ($readrow['fld_product_image'] == "" || $readrow['fld_product_image'] == null) {
                echo "products/nophoto.jpg";
            }

            else { ?>

               
                <img src="products/<?php echo $readrow['fld_product_image'] ?>" class="img-responsive" width="60%" height="60%">
                <?php } ?>
                <!-- caption -->
                <div class="caption">
                  <h4><?php echo $readrow['fld_product_name']; ?></h4>
                  <p style="height: 70px; font-size:100%;">
                    <strong>Price : RM</strong> <?php echo $readrow['fld_product_price']; ?><br>
                </div>
                <!-- product details -->
                  <a id="detail" data-href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-primary btn-block" role="button">View Product</a>
                </div>
              </div>
            
          
        
            <?php } }
            else { ?>
                <div class="row">
                <a><center><?php echo "Record Not Found!" ?></center>></a>
                </div> 
                <?php }
            }?>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Product Details</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('[id*="detail"]').on('click',function(){
        var dataURL = $(this).attr('data-href');
    $('.modal-body').load(dataURL,function(){
        $('#myModal').modal({show:true});
        });
    }); 
});
</script>
</body>
</html>