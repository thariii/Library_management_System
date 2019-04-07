<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){   
    header('location:index.php');
}
else{ 

    if(isset($_POST['update'])){
        $type=$_POST['type'];
        $category=$_POST['category'];
        $quantity=$_POST['quantity'];
        $date=$_POST['date'];
        $description=$_POST['description'];
        $inventoryid=intval($_GET['ID']);
        $sql="update tblinventory set Type=:type,Category=:category,quantity=:quantity,Date=:date,description=:description where id=:inventoryid";

        $query = $dbh->prepare($sql);
        $query->bindParam(':type',$type,PDO::PARAM_STR);
        $query->bindParam(':category',$category,PDO::PARAM_STR);
        $query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
        $query->bindParam(':date',$date,PDO::PARAM_STR);
        $query->bindParam(':description',$description,PDO::PARAM_STR);
        $query->bindParam(':inventoryid',$inventoryid,PDO::PARAM_STR);
        $query->execute();

        $_SESSION['msg']="Inventory info updated successfully";
        header('location:inventory-management.php');

    }

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Edit Inventory</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

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
                    <h4 class="header-line">Update Inventory</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
                    <div class="panel panel-info">
                        <div class="panel-heading">Item Info</div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <?php 
                                $inventoryid=intval($_GET['ID']);
                                $sql = "SELECT * from  tblinventory where tblinventory.id=$inventoryid";
                                $query = $dbh -> prepare($sql);
                                $query->bindParam(':inventoryid',$inventoryid,PDO::PARAM_STR);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                    foreach($results as $result)
                                {               
                            ?>  

                            <div class="form-group">
                                <label>Item<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="type" id="type" value="<?php echo htmlentities($result->Type);?>" required="required" />
                            </div>

                            <div class="form-group">
                                <label>Category<span style="color:red;">*</span></label>
                                <select class="form-control" name="category" id = "category" value="<?php echo htmlentities($result->Category);?>"  required="required">
                                    <option value="Furnitures">Furnitures</option>
                                    <option value="Electrical Items">Electrical Items</option>
                                    <option value="Tools">Tools</option>
                                    <option value="Stationary">Stationary</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Quantity<span style="color:red;"></span></label>
                                <input class="form-control" type="text" name="quantity" id="quantity" value="<?php echo htmlentities($result->quantity);?>"  />
                            </div>

                             <div class="form-group">
                                <label>Date<span style="color:red;"></span></label>
                                <input class="form-control" type="date('Y-m-d H:i:s')" name="date" id="date" value="<?php echo htmlentities($result->Date);?>"  />
                            </div>
                            
                            <div class="form-group">
                                <label>Description<span style="color:red;"></span></label>
                                <input class="form-control" type="text" name="description" id="description" value="<?php echo htmlentities($result->description);?>" style="height: 100px" />
                            </div>   

                            <?php }} ?>
                            <button type="submit" name="update" class="btn btn-info">Update </button>

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
<?php } ?>
