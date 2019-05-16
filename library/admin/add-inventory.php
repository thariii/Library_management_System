<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{   
    header('location:index.php');
}
else{ 

    if(isset($_POST['addinventory']))
    {

        $inventoryid=$_POST['inventoryid'];
        $item=$_POST['type'];
        $category=$_POST['category'];
        $quantity=$_POST['quantity'];
        $description=$_POST['description'];

        $sql="INSERT INTO tblinventory(id,Type,Category,quantity,description) VALUES('$inventoryid','$item','$category','$quantity','$description')";

        //mysql_query($dbh, $sql);
        $query = $dbh->prepare($sql);

        //$query->bindParam(':inventoryid',$inventoryid,PDO::PARAM_STR);
        //$query->bindParam(':item',$type,PDO::PARAM_STR);
        //$query->bindParam(':category',$category,PDO::PARAM_STR);
        //$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
        
        $query->execute();
        
        
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
            $_SESSION['error']="Something went wrong. Please try again";
            header('location:inventory-management.php');
        }
        else 
        {
            $_SESSION['msg']="Added successfully";
            header('location:inventory-management.php');
        }

    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Add Inventory</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <style type="text/css">
        .others{
            color:red;
        }
    </style>


</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wra
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Add Inventory</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1"">
                    <div class="panel panel-info">
                        <div class="panel-heading">Add a New Inventory</div>
                            <div class="panel-body">
                                <form role="form" method="POST">

                                    <div class="form-group">
                                        <label>Inventory id<span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" name="inventoryid" id="inventoryid" autocomplete="off"  required />
                                    </div>

                                    <div class="form-group">
                                        <label>Item<span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" name="type" id="type" required="required" />
                                    </div>

                                     <div class="form-group">
                                        <label>Category<span style="color:red;">*</span></label>
                                        <select class="form-control" name="category" id = "category" required="required">
                                            <option value="Furnitures">Furnitures</option>
                                            <option value="Electrical Items">Electrical Items</option>
                                            <option value="Tools">Tools</option>
                                            <option value="Stationary">Stationary</option>
                                        </select>
                                    </div>

                                      <div class="form-group">
                                        <label>Quantity<span style="color:red;"></span></label>
                                        <input class="form-control" type="text" name="quantity" id="quantity" />
                                    </div>

                                    <div class="form-group">
                                        <label>Date<span style="color:red;">*</span></label>
                                        <?php
                                            $currentDateTime = date('Y-m-d H:i:s');
                                            echo $currentDateTime;
                                        ?>
                                    </div>
                                     <div class="form-group">
                                        <label>Description<span style="color:red;"></span></label>
                                        <input class="form-control" type="text" name="description" id="description" style="height: 100px" />
                                    </div>

                                    
                                    <button type="submit" name="addinventory" id="submit" class="btn btn-info">Add Inventory</button>

                                </form>
                                    </div>
                            </div>
                        </div>

                    </div>
   
                </div>
             </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
<?php } 
?>