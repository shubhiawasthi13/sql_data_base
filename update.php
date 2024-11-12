<?php
include("./config.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $get_students =$conn->prepare("select * from students where id='$id'");
    $get_students->execute();
    $students_data = $get_students->fetchAll();

    $name = $students_data[0]['name'];
    $course = $students_data[0]['course'];
    $city = $students_data[0]['city'];
}
?>




<form action="" method ="post">
    <input type="text" value ="<?php echo $name?>" name="name"/>
    <br>
    <br>
    <input type="text" value ="<?php echo $course?>" name="course"/>
    <br>
    <br>
    <input type="text" value ="<?php echo $city?>" name="city"/>
    <br>
    <br>
    <button value="<?php echo $id?>" name="update">Updata data</button>
</form>

<?php
if(isset($_POST['update'])){
    $id = $_POST['update'];
    $name =$_POST['name'];
    $course =$_POST['course'];
    $city =$_POST['city'];

    $update_query = $conn->prepare("update students set
    name='$name',
    course='$course',
    city='$city'
    where id='$id'");

if($update_query->execute()){
    header("location:read_delete.php");
}else{
    echo "updation failed";
}
}
?>