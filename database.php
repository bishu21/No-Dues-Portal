<!DOCTYPE html>
<html>
<head>
<style>

#tr1{
    height:50px;
    display:block;
    text-align:center;
    font-size:40px;
    text-decoration: underline;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}
tr.rollnum:nth-child(even){background-color: #f2f2f2;}
th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>
<span id="tr1"> Students Data </span>

<?php       
    require 'config.php';
    

    $max_num_course=3;
    $max_dept=1;
    $courses=array();
    $i;
    for($i=1;$i<=$max_num_course; $i++)
    {
        $x="course".$i;
        $courses[$i]=$row[$x];
    }
    if($row['course1']!=NULL){
        echo "<table>
    <tr id=\"header\">
    <th>Course </th>
    <th>Roll No</th>
    <th>Name</th>
    <th>Dues(Rs.)</th>
    <th>Select ALL<input id=\"select_all\" type=\"checkbox\" style=\"zoom:1.5;\" onclick=\"checkbox()\" >
    </th>
    <th>Comments</th>
    <th><input id=\"select_all\" type=\"submit\" value=\"submit selected with due 0\"></th></tr>";
    $find_course=array("cse_dues");
    $i;
    $j;
    $k=0;
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
                    $k++;
                    $dues=$row[$courses[$j]];
                    $rollnum=$row['roll'];
                    $coursecode=$courses[$j];

                    $search1 ="SELECT * FROM `students_data` WHERE `roll`=".$row['roll'];
                    $result1 = mysqli_query($conn,$search1);
                    $row1 = mysqli_fetch_assoc($result1);

                    if($row[$courses[$j]]!=-1)
                    {
                    echo "<form action=\"submit.php\" method=\"POST\">";
                    echo "<tr id=\"list\"><td><input type=\"text\" value=\"$coursecode\" readonly style=\"border:0px;\" name=\"coursecode\"></td>";

                    echo "<td><input id=\"rollnum\" type=\"text\" value=\"$rollnum\" readonly
                            style=\"border:0px;\" name=\"rollnum\"></td>";

                    echo "<td>".$row1['name']."</td>";
                    
                    echo "<td><input type=\"text\" value=\"$dues\">"
                            ."</td>";

                if($row[$courses[$j]]==0)
                    echo "<td><input class=\"check\" type=\"checkbox\" style=\"zoom:1.5\" 
                            name=\"checkbox\"></td>";
                else
                    echo "<td><input class=\"check\" type=\"checkbox\" style=\"zoom:1.5\"
                                name=\"checkbox\"></td>";

                    echo "<td><input type=\"text\" name=\"comments\"></td>";
                    echo "<td><input type=\"submit\" value=\"Submit\" name=\"rownum[$k]\"></td></tr>";
                    echo "</form>";
                    } 
                    }          
                }   
            }
        }
}
echo "</table>";
}

else
{  
echo "<table>
    <tr id=\"header\">
    <th>Roll No</th>
    <th>Name</th>
    
    <th>Thesis_submitted</th>
    <th>Dues(Rs.)</th>
    <th>Select ALL<input id=\"select_all\" type=\"checkbox\" style=\"zoom:1.5;\" onclick=\"checkbox()\" >
    </th>
    <th>Comments</th>
    <th><input id=\"select_all\" type=\"submit\" value=\"submit selected with due 0\"></th></tr>";


 $k=0;
    $designation = $row['designation'];
    switch($designation)
    {
        case "Librarian":
        //if( mysqli_num_rows($result) > 0)
        $search1 ="SELECT * FROM `students_data`";
                    $result1 = mysqli_query($conn,$search1);
                    while($row1 = mysqli_fetch_assoc($result1))
                    {
                    $k++;
        
                    //$row1 = mysqli_fetch_assoc($result1);
                    $dues = $row1['library_dues'];
                    $thesis = $row1['Thesis_submitted'];
                    $rollnum=$row1['roll'];
                    if($row1['librarian']==0)
                    {
                    echo "<table><form action=\"submit1.php\" method=\"POST\">";
                    
                    echo "<tr><td><input id=\"rollnum\" type=\"text\" value=\"$rollnum\" readonly
                            style=\"border:0px;\" name=\"rollnum\"></td>";

                    echo "<td>".$row1['name']."</td>";
                    echo "<td><input type=\"text\" value=\"$thesis\" readonly style=\"border:0px;\" name=\"Thesis_submitted\"></td>";


                    echo "<td><input type=\"text\" value=\"$dues\">"
                            ."</td>";
                            if($thesis==1){
                if($dues==0)
                    echo "<td><input class=\"check\" type=\"checkbox\" style=\"zoom:1.5\" 
                            name=\"checkbox\"></td>";
                else
                    echo "<td><input class=\"check\" type=\"checkbox\" style=\"zoom:1.5\"
                                name=\"checkbox\"></td>";}

                    echo "<td><input type=\"text\" name=\"comments\"></td>";
                    echo "<td><input type=\"submit\" value=\"Submit\" name=\"rownum[$k]\"></td></tr>";
                    echo "</form></table>";
                    }
                }
    }
}
?>

<script>
    function checkbox()
    {
        var x,i;
        if(document.getElementById("select_all").checked==true)
        {  
            x=document.getElementsByClassName("check");
            for(i=0;i<x.length;i++)
            {
                x[i].checked=true;
            }
        }
        else if(document.getElementById("select_all").checked==false)
        { 
            x=document.getElementsByClassName("check");
            for(i=0;i<x.length;i++)
            {
                x[i].checked=false;
            }
        }    
    }
</script>

</body>
</html>
