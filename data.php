<?php       
    require 'config.php';
    $max_num_course=5;
    $max_dept=3;
    $courses=array();
    $i;
    for($i=1;$i<=$max_num_course; $i++)
    {
        $x="course".$i;
        $courses[$i]=$row[$x];
    }
    $find_course=array("cse_dues","mnc_dues","ece_dues");
    $i;
    $j;
    for($i=0; $i<$max_dept; $i++)
    {
        $x=$find_course[$i];
        for($j=1; $j<=$max_num_course; $j++)
        {
            if($courses[$j]!=NULL)
            {
                $search = "SELECT * FROM `$x` WHERE `$courses[$j]` IS NOT NULL";
                $result = mysqli_query($conn,$search);
                
                if($result)
                {
                    if( mysqli_num_rows($result) > 0)
                    while($row = mysqli_fetch_assoc($result))
                    {

                    $search1 ="SELECT * FROM `students_data` WHERE `roll`=".$row['roll'];
                    $result1 = mysqli_query($conn,$search1);
                    $row1 = mysqli_fetch_assoc($result1);

                    echo "<tr id=\"list\"><td>".$courses[$j]."</td>";
                    echo "<td>".$row['roll']."</td>";
                    echo "<td>".$row1['name']."</td>";
                    echo "<td>".$row[$courses[$j]]."</td>";

                if($row[$courses[$j]]==0)
                    echo "<td><input class=\"check\" type=\"checkbox\" style=\"zoom:1.5\" checked></td>";
                else
                    echo "<td><input class=\"check\" type=\"checkbox\" style=\"zoom:1.5\"></td>";

                    echo "<td><input type=\"text\"></td>";
                    echo "<td><input type=\"button\"value=\"Submit\"></td></tr>";
                    }           
                }   
 