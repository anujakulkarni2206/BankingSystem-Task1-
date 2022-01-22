<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transaction History</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <style type="text/css">
            body{
	        background-image:url("IMG/history.jpg") ;
	        background-position: center;
	        background-size: cover;
	        height: 100vh;
            opacity:50;
            font-weight: bolder;
            }
        
        th {
            text-align: center;
            background-color:#855681;
            color:white;
        }
        td{
            color:#000000;
        }
        td,th{
            text-align: center;
        }
        </style>
    </head>
    <body>
    <?php
     include('sidebar.html');
    ?>
	    <div class="container">
            <h2 class="text-center pt-4">Transaction History</h2>
            <br>
            <div class="table-responsive-sm">
                <table class="table table-hover table-striped table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Received From</th>
                            <th>Credited To</th>
                            <th>Sender Account No</th>
                            <th>Recipient Account No</th>
                            <th>Transacted Amount</th>
                            <th>Date And Time</th>

                         </tr>
                    </thead>
                <tbody>
                    <?php
                        include 'config.php';
                        $sql ="select * from Transaction";
                        $query =mysqli_query($conn, $sql);
                        while($rows = mysqli_fetch_assoc($query))
                    {
                    ?>

                    <tr>
                        <td class="py-2"><?php echo $rows['id']; ?></td>
                        <td class="py-2"><?php echo $rows['Received From']; ?></td>
                        <td class="py-2"><?php echo $rows['Credited To']; ?> </td>
                        <td class="py-2"><?php echo $rows['Sender Account No']; ?> </td>
                        <td class="py-2"><?php echo $rows['Recipient Account No']; ?></td>
                        <td class="py-2"><?php echo $rows['Transacted Amount']; ?></td>
                        <td class="py-2"><?php echo $rows['Date And Time']; ?></td>
                
                    <?php
                    }
                    ?>
                </tbody>
                </table>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>