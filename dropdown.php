<?php
 include("./config.php");
$get_student =$conn->prepare("select id, name from students");
$get_student->execute();
$student_data = $get_student->fetchAll();

echo "<select>";
echo "<option>select name</option>";
foreach($student_data as $student){
    echo "<option value=".$student['id'].">".$student['name']."</option>";

}
echo "</select>";
?>