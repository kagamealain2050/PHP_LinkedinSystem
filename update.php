<?php
include "connection.php";
include "welcome.php";
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id= '$id' ";
$result = $con->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body{
            background:rgba(68, 61, 61, 0.1);
        }
        fieldset{

            width: 30%;
            height:50%;
            border-radius:5px;
            margin: 0 auto;
            padding: 20px;
            box-shadow:1px 2px 5px 5px rgba(1, 1, 1, 0.1);
            border:none;
            margin-top:4rem;
            
        }
        .button{
            background:green;
            color: white;
            padding: 5px;
            margin:0 auto;
            width: 70%;
            border-radius:5px;
            display: block;
            border:none;
            
        }
        .button:hover{
            background:black;
            color:white;
            transition:0.5s;
            padding: 5px;
            cursor: pointer;
            transform:scale(1.2);
            
        }
        input{
            border:none;
            border-bottom: 1px solid green;
            margin:5px;
            outline:none;
        }
        .legend{
            color:green;
            margin:5px;
            padding: 5px;
            font-size:20px;
            
        }
        table td{
            padding: 7px;
        }
        table{
            
        }
    </style>
</head>
<body> 
    <fieldset>
       <form action="" method="POST">
        <table border="0" align="center">
        <tr>
            <td colspan='2' class='legend' align='center'>UPDATE FORM</td>
        </tr> 

        <tr>
        <td colspan='1'><input type="hidden" name="id" value="<?php echo $row['id']; ?>"></td> 
        </tr>
       <tr><td>Fullname</td>
       <td><input type="text" name="a" value="<?php echo $row['full_name']; ?>"></td></tr>

       <tr><td>Email</td>
       <td><input type="text" name="c" value="<?php echo $row['email']; ?>"></td></tr>


       <tr><td colspan='2'><input type="submit" name='btn' value="UPDATE" class='button'></td></tr>

       </form>
       </table>
    </fieldset>
</body>
</html>

<?php 
//include "connection.php";

if(isset($_POST['btn'])){
$a= $_POST['a'];
$c= $_POST['c'];

$update = "UPDATE `users` SET `full_name` = '$a',  `email` = '$c'  WHERE `users`.`id` = '$id'";

if($con->query($update) === TRUE){
  
    echo "Update is Successfull !!";
}else{

    echo "Error Updating".$con->error;
}
header("location:select.php");
$con->close();
}
?>

