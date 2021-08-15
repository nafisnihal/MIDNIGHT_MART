<?php
session_start();
require_once('../service/product_service.php');

    if(isset($_GET['id']))
    {
        $complain_id= $_GET['id'];
        
        $cmp = complainDelete($complain_id);
        if($cmp==true)
        {
           
        header("location:../views/Customer_view/complain.php?Message:DeleteSuccessFul");
        }
        else
        {
            //echo "Delete Failed!";
            header("location:../views/Customer_view/complain.php?Message:DeleteFailed");
        }

    }

?>
    