<?php
$xml=simplexml_load_file("data.xml") or die("Error: Cannot create object");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

    <link rel="stylesheet" href="../../css/navbar_customerhome.css">
    <link rel="stylesheet" href="../../css/inventory.css">
    <style>
        .table{
            width: 50%;
            float: left;
        }

        .xml-input{
            width: 50%;
            float: left;
            
        }
        input[type=submit] {
            background-color: #009879;
            border: none;
            color: white;
            padding: 10px 30px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            }
            input[type=submit]:hover{
                background-color: rgb(218, 83, 83);
            }
        #footer{
            background-color: #f19494;
            text-align:center;
            }
    </style>

</head>
<body>

    <div id="navbar">
            <p id="logo"><b>Midnight Mart</b></p> 
        </div>
        <ul>
            <li><a href="../../php/logout.php">Logout</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="adminhome.php">Home</a></li>
        </ul>

    <div>
        
        <div class="xml-input">
                <form method="POST" action='insertxml.php' id="txt">
                    <p id="txt">Add to Inventory</p><br>

                    Item Name:<br><input type="text" name="item_name"><br>
                    Cost/Unit:<br><input type="text" name="item_cost"><br>
                    Recieved Unit:<br><input type="text" name="item_recieved"><br>
                    Sold Unit:<br><input type="text" name="item_sold"><br>
                    Unsold Unit:<br><input type="text" name="item_unsold"><br>
                    <input type="submit" name="insert" Value="ADD"><br>
                </form>
            
            </div>
        
        <div class="table">
                
                <p id="txt">INVENTORY <br>Summary of Month August, 2021</p><br>
                
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Unit Price</th>
                            <th>Recieved Unit</th>
                            <th>Sold Unit</th>
                            <th>Available Unit</th>
                        <tr>
                    <thead>
                    <tbody>
                        <?php foreach ($xml->item as $itm) : ?>
                        <tr>
                            <td><?php echo $itm->name; ?></td>
                            <td><?php echo $itm->cost; ?></td>
                            <td><?php echo $itm->recieved; ?></td>
                            <td><?php echo $itm->sold; ?></td>
                            <td><?php echo $itm->available; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        
    </div>

</body>
<div id="footer">
<?php include '../../php/footer.php';?>
</div>
</html>