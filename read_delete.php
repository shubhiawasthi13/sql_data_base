<?php
include("./config.php");
$get_student =$conn->prepare("Select * from students");
$get_student->execute();
$students_data = $get_student->fetchAll();


echo "<table border='1' >";
foreach($students_data as $students){
    echo "<tr>
    <td>".$students['name']."</td>
    <td>".$students['course']."</td>
     <td>".$students['city']."</td>
      <td><form method='post'>
      <button name =delete value =".$students['id'].">delete</button>
      <a href = 'update.php?id=".$students['id']."'>edit</a>
      </form></td>
    </tr>";


}
    
 if(isset($_POST['delete'])){
    $id =$_POST['delete'];
    $delete_query =$conn->prepare("delete from students where id='$id'");
    $result = $delete_query->execute();

    if($result){
        echo "<script>alert('record deleted')</script>";  
        header("Refresh:0");

    }else{
        echo "failed to delete";
    }
 
}


?>