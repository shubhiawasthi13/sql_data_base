<form action="" method="post">
    <input type="text" name="search" plaaceholder="search name"/>
    <br>
    <br>
    <button>Search</button>
</form>

<?php
include("./config.php");
if(isset($_POST['search'])){
$search = $_POST['search'];
// $search_student =$conn->prepare("select * from students where name '$search'");
// $search_student =$conn->prepare("select * from students where name like'$search%'");
$search_student =$conn->prepare("select * from students where name like'%$search%'");
$search_student->execute();
$result = $search_student->fetchAll();

echo "<table border='1' >";
foreach($result as $student){
    echo "<tr>
    <td>".$student['name']."</td>
    <td>".$student['course']."</td>
     <td>".$student['city']."</td>

    </tr>";
}
echo "</table>";
}
?>
