<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Customers</title>
    <link rel="stylesheet" type="text/css" href="CSS/customers.css">
</head>
<style>
</style>
<body>
    <?php  
       include('sidebar.html');
       include 'config.php';
       $sql = "SELECT * FROM Customer";
       $result = mysqli_query($conn,$sql);
    ?>
    
            <h1 class="heading">Our Customers</h1>
                     <table class="styled-table" style="width:1200px">
                        <thead>
                           <tr>

                             <th>Sr No.</th>
                             <th>Account No</th>
                             <th>Account Holder Name</th>
                             <th>Email</th>
                             <th>Account Balance(In RS)</th>
                             <th>Transfer Money</th>

                          </tr>
                       </thead>

                  <tbody>

                    <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                    ?>

                    <tr>
                        <td>
                            <?php echo $rows['id'] ?>
                        </td>
                        <td>
                            <?php echo $rows['Account No']?>
                        </td>
                        <td>
                            <?php echo $rows['Account Holder Name']?>
                        </td>
                        <td>
                            <?php echo $rows['Email']?>
                        </td>
                        <td>
                            <?php echo $rows['Account Balance(In RS)']?>
                        </td>
                        <td><a href="details_transfer.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn">View Details and Transact</button></a></td> 
                    </tr>
                    <?php
                    }
                ?>

                </tbody>
            </table>


</body>
</html>