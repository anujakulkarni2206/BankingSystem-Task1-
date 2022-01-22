<?php
include('sidebar.html');
include 'config.php';
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from Customer where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from Customer where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    if (($amount)<0)
     {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
     }
    
    else if($amount > $sql1['Account Balance(In RS)']) 
     {
        
        echo '<script type="text/javascript">';
        echo ' alert("Ohh! Insufficient Balance")'; 
        echo '</script>';
     }
   
    else if($amount == 0)
     {

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }

    else 
      {
              
                $newbalance = $sql1['Account Balance(In RS)'] - $amount;
                $sql = "UPDATE `Customer` SET `Account Balance(In RS)`=$newbalance where id=$from";
                mysqli_query($conn,$sql);
                
                $newbalance = $sql2['Account Balance(In RS)'] + $amount;
                $sql = "UPDATE `Customer` SET `Account Balance(In RS)`=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Account Holder Name'];
                $receiver = $sql2['Account Holder Name'];
                $saccno = $sql1['Account No'];
                $raccno = $sql2['Account No'];
                $sql = "INSERT INTO `Transaction` (`Received From`, `Credited To`, `Sender Account No`,`Recipient Account No`,`Transacted Amount`) VALUES ('$sender','$receiver','$saccno','$raccno','$amount')";
                $query = mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='customers.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
     }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details And Transfer Money</title>
    <style media="screen" type="text/css">
       
        div.transfer{
            top: 40px;
            margin:auto;
            width:1100px;
            height:400px;
            text-align: center;
            align-items: center;
            position:relative;
            background-color: rgb(225 183 217);
            padding:20px;
            font-family: Arial, sans-serif;
            border-radius:10px;
            box-shadow:0 2px 8px black;
        }
        div table {
            font-family: arial, sans-serif;
            display: table;
            margin: auto;
            background-color: rgb(250, 252, 251);
            color: whitesmoke;
            border-collapse: collapse;
        }
        h2{
            font-size:30px;
        }

        table th {
            background-color:#691362;
            color: white;
        }

        tr {
            color: black;
            font-weight: bold;
        }

        td,
        th {
            border: 1px solid #b8a6a6;
            text-align: left;
            padding: 8px;
        }
        }
        #receiver{
            height:22px;
            padding:1px 2px;
            border:2px;
        }
        #amount{
            border:2px;
        }
        .btn{
            margin:auto;
            text-align: center;
            align-items:center;
            display:flex;
            
        }
        button{
            margin:auto;
            height:40px;
            text-align: center;
            align-items:center;
            position:relative;
            bottom:15px;
            border:none;
            padding:10px;
            color:black;
            font-weight: bold;
            border-radius:5px;
            background-color:#691362;
            color:white;
            font-family:Arial, Helvetica, sans-serif;
            transition: 0.25s;
        }
        button:hover{
            background-color:white;
            color: black;
            transform: translate(0, -3px);
            box-shadow: 0 2px 6px black;
        }
        footer{
            margin:auto;
            text-align: center;
            padding:100px;
        }
        footer p{
            font-weight:bold;
            color:black;
        }
    
    </style>
</head>

<body>
  
	<div class="transfer">
        <h2 style="text-align:center">Transfer Money</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  Customer where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit"><br>
        <div>
            <table>
                <tr>
                    <th>Sr No</th>
                    <th>Account No</th>
                    <th>Account Holder Name</th>
                    <th>Email</th>
                    <th>Account Balance(In RS)</th>
                </tr>
                <tr>
                    <td><?php echo $rows['id'] ?></td>
                    <td><?php echo $rows['Account No'] ?></td>
                    <td><?php echo $rows['Account Holder Name'] ?></td>
                    <td><?php echo $rows['Email'] ?></td>
                    <td><?php echo $rows['Account Balance(In RS)'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>

        <label for="receiver" style="font-weight:bold">Transfer To:</label>
        <select id="receiver" name="to" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM Customer where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['Account Holder Name'] ;?> (Balance: 
                    <?php echo $rows['Account Balance(In RS)'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
        </select>
        <br>
        <br>
            <label style="font-weight:bold" for="amount">Amount in RS
            :</label>
            <input id="amount" type="number" name="amount" required>   
            <br><br><br>
            <div class="btn">
                <button name="submit" type="submit" >Transfer</button>
            </div>
            
        </form>
    </div>
    
    <footer class="footer">
            <p><i>&#169; copyright 2022.</i></p>
            <p><i>All rights reserved. Powered by <a href="https://www.thesparksfoundationsingapore.org/">The Sparks Foundation</a></i></p>
    </footer>
</body>