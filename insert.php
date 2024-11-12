<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name"/>
        <br><br>
        <input type="text" name="course"/>
        <br><br>
        <input type="text" name="city"/>
        <br><br>
        <button>Add student</button>
    </form>
    
</body>
</html>


 <?php

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $course = $_POST['course'];
    $city = $_POST['city'];
    include("./config.php");

    $insert_query=$conn->prepare("
    INSERT INTO `students` (`name`,`course`,`city`) VALUES ('$name','$course','$city')");
    $result= $insert_query->execute();

    if($result){
        echo "<script>alert('data inserted successfully')</script>";  
        // echo "<script>window.open('admin_login.php','_self')</script>"; 
     }else{
        echo "failed";
     }
}

?> 