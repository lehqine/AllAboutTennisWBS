<?php
session_start();
include("auth.php");
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
  if($_SESSION['position1']=='Admin'){
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_products_a180970_pt2(fld_product_num,
        fld_product_name, fld_product_price, fld_product_brand, fld_product_type, fld_product_quantity, fld_product_description) VALUES(:pid, :name, :price, :brand, :type, :quantity, :description)");
   
    $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
      $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    
    
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand =  $_POST['brand'];
    $type =  $_POST['type'];
    $quantity = $_POST['quantity'];
    $description =  $_POST['description'];
     
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
    }else{
  $message = "Sorry, you have no rights to modify!!";
    echo "<script type='text/javascript'>alert('$message');";
    echo "window.location.href = 'products.php';";
    echo "</script>";
}
}
 
//Update
if (isset($_POST['update'])) {
    if($_SESSION['position1']=='Admin' || $_SESSION['position1']=='Supervisor'){
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_products_a180970_pt2 SET fld_product_num = :pid,
        fld_product_name = :name, fld_product_price = :price, fld_product_brand = :brand, fld_product_type = :type, fld_product_quantity = :quantity, fld_product_description = :description
        WHERE fld_product_num = :oldpid");
   
    $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
      $stmt->bindParam(':description', $description, PDO::PARAM_STR);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand =  $_POST['brand'];
    $type =  $_POST['type'];
    $quantity = $_POST['quantity'];
    $description =  $_POST['description'];
    $oldpid = $_POST['oldpid'];
         
    $stmt->execute();
 
     header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
   }else{
  $message = "Sorry, you have no rights to modify!!";
    echo "<script type='text/javascript'>alert('$message');";
    echo "window.location.href = 'products.php';";
    echo "</script>";
}
}
 
//Delete
if (isset($_GET['delete'])) {
 if($_SESSION['position1']=='Admin'){
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_products_a180970_pt2 WHERE fld_product_num = :pid");
   
    $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
   }else{
  $message = "Sorry, you have no rights to modify!!";
    echo "<script type='text/javascript'>alert('$message');";
    echo "window.location.href = 'products.php';";
    echo "</script>";
}
}
 
//Edit
if (isset($_GET['edit'])) {
  if($_SESSION['position1']=='Admin' || $_SESSION['position1']=='Supervisor'){
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_products_a180970_pt2 where fld_product_num = :pid");
   
    $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
   }else{
  $message = "Sorry, you have no rights to modify!!";
    echo "<script type='text/javascript'>alert('$message');";
    echo "window.location.href = 'products.php';";
    echo "</script>";
}
}
 
  $conn = null;
 
?>