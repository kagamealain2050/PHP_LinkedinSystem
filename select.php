<?php
require "connection.php";
include "welcome.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Records</title>
    <style>
        body{
            background:rgba(110, 108, 108, 0.1);
        }
        table{
          width: 70%;
          height:10%;
          border-collapse:collapse;
          background:#fff;
          border-radius:6px;
          overflow:hidden;
          box-shadow:1px 2px 5px 5px rgba(1, 1, 1, 0.1);
          margin-top:4rem;
        }
        table th{
            padding:15px;
            border:none;
            background:rgba(1, 1, 1, 0.1);
        }
        table td{
           border:none; 
        }
        
        .up{
            background:green;
            color:white;
        }
        .dl{
            background:red;
            color:black;
        }
        button{
            border:none;
            padding:6px 10px;
            border-radius:5px;
            width: 80px;
            height: 30px;
            cursor: pointer;
            font-size:13px;
            transition:0.2s;
        
        }
        button:hover{
            background: #000;
            color:white;
        }
    </style>
</head>
<body>
    <table border='1' cellpadding="8" cellspacing="0" align="center">
        <tr>
            <th>ID</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Time</th>
            <th>Action</th>
            
        </tr>
       
        <?php
$sql="SELECT * FROM users";
$result = mysqli_query($con,$sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){

    $id=$row['id'];
    echo "<tr>";
    echo "<td align='center'>".$row['id']."</td>";
    echo "<td align='center'>".$row['full_name']."</td>";
    echo "<td align='center'>".$row['email']."</td>";
    echo "<td align='center'>".$row['created_at']."</td>";
    echo "<td colspan='2' align='center'>
    <a href='delete.php? id=$id'onclick='return confirm(\"Are you sure?\");'><button class='dl'>Delete</button></a>
  | <a href='update.php? id=$id'onclick='return confirm(\"Are you sure?\");'><button class='up'>Update</button></a>
          </td>";
    echo "</tr>";
         
    }       
}else{
    echo "No Record Found !!";
}
?> 

    </table>
</body>
</html>

<?php
$con->close();
?>

