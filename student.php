<?php
   include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>
	MY PROFILE
</title>
<style>
.header{
	position:fixed;
	background-color:white;
	left: 0px;
	height:100px;
	top:0px;
	width:100%;
}
#head1{
	float:left;
	width:100px;
	height:100px;
	margin-left: 10px;
}
#head2{
	float: left;
	width:70%;
	margin-top:10px;
	margin-left: 5px;
}
#head3{
	font-size:30px;
	color: #1E2B78;
}
ul.tab {
	position: fixed;
	left: 0px;
	top:100px;
	width:100%;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:  #000000
;
}

/* Float the list items side by side */
ul.tab li {
    float: left;
}

/* Style the links inside the list items */
ul.tab li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 18px;
}

/* Change background color of links on hover */
ul.tab li a:hover:not(.active) {
	cursor: pointer;
    background-color:blue; /*#111*/;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
    background-color: blue;
}

/* Style the tab content */
.tabcontent {
    display: none;  
    left:500px;
    margin-top: 164px;
}
#homepage,#hostel,#library,#labs,#Computer_centre,#Final_report{
	margin-top: 190px;
}
#img{
	position:fixed;
	float: left;
	top:149px;
	left:1px;
	width: 18%;
}
#upload{
	width:100%;
	height: 80%;
	margin-top: -5px;
	border:1px solid blue;
}
#upload_file
{
	width:100%;
	background-color: #f3156f;
    color: white;
    padding: 12px 32px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
}
#data{
	background-color:  #404040;
	margin-top:-25px;
	margin-left: 240px;
	float: left;
	width:1110px;
	height:400px;
}

</style>
</head>
<body>

<!--/////////////////////////////////////////////////////////////////////////-->
<div class="header">
	<div id="head1"><img src="logo1.gif" height="100px" width="100%"></div>
	<div id="head2"><span id="head3">INDIAN INSTITUTE OF TECHNOLOGY <br/>
						  			NO DUES PORTAL
					</span>
	</div>
</div>
<!--////////////////////////////////////////////////////////////////////////////-->
<div class="nav">
<ul class="tab">
	<li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'homepage')">Home page</a></li>
  	<li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'hostel')">Hostel</a></li>
  	<li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Department')">Department</a></li>
  	<li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'library')">Library</a></li>
  	
  
  	
  	<li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Final_report')">Final Report</a></li>
  	<li style="float:right"><a class="active" href="logout.php">Sign Out</a></li>
</ul>
</div>
<!--//////////////////////////////////////////////////////////////////////////-->
	<div id="homepage" class="tabcontent" style="display:block;">
		<div id="img">
			<img src="img.jpg" width="100%" height="430px">
			<div id="upload"><input id="upload_file" type="button" value="Image"></div>
		</div>
		<div id="data"> 

<?php 
			$row=$_SESSION['user_data'];
			echo "<p style='color: white;margin-top:20px; margin-left:30px;font-size:25px;'> Name: ". $row['name']."</p>";
			echo "<p style='color:white;margin-top:20px; margin-left:30px;font-size:25px;'>Roll No:". $row['roll']."</p>";
			
			echo "<p style='color:white;margin-top:20px; margin-left:30px;font-size:25px;'>Year of Passing: ". $row['year_pass']."</p>";
			
			
			
			?>
			<!-- <?php 
			$row=$_SESSION['user_data'];
			echo "Name:". $row['name']." <br/>"; 
			echo "Roll No:". $row['roll']." <br/>";
			
			echo "Year of Passing: ". $row['year_pass']."<br/>"; 
			
			?> -->
		</div>
	</div>

	<div id="hostel" class="tabcontent">
		<div id="img">
			<img src="img.jpg" width="100%" height="430px
			">
			<div id="upload"><input id="upload_file" type="button" value="Image"></div>
		</div>
		<div id="data"> 
			<?php
			if($row['warden'] == 1)
			{
				echo "<span>Hostel dues cleared by both warden and caretaker</span>";
		  	}
		  	else if($row['caretaker'] == 1)
		  	{
		  		echo "<span>Hostel dues cleared by caretaker but warden confirmation left</span>";
		  	}
		  	else
		  	{
		  	echo "<span>Hostel dues not yet cleared.<br>Current hostel dues =".$row['hostel_due'].
		  			"</span>";
		  	}
			?>
		</div>
	</div>

	
	<div id="library" class="tabcontent">
		<div id="img">
			<img src="img.jpg" width="100%" height="430px">
			<div id="upload"><input id="upload_file" type="button" value="Image"></div>
		</div>
		<div id="data"> 
			<?php
			if($row['librarian']==1)
			{
				echo "<span>Library dues cleared and thesis submitted</span>";
			}
			else
			{
				if($row['Thesis_submitted'] == 1)
				{
					echo "<span>Thesis submitted but library dues not cleared yet.</span>";
				}
				else
				{
					echo "<span>Library dues not cleared and thesis not submitted.<br>Submit thesis to get clearance from librarian</span>";
				}
			}

			?>
		</div>
	</div>

	<div id="Department" class="tabcontent">
		<div id="img">
			<img src="img.jpg" width="100%" height="430px">
			<div id="upload"><input id="upload_file" type="button" value="Image"></div>
		</div>
		<div id="data" style="margin-top:140px;"> 
			<?php
			if($row['dept_dues']==0)
			{
				echo "all departmental dues cleared";
			}
			else if($row['dept_dues']!=0)
			{
				echo "dues not cleared by hod .<br> current dues =".$row['dept_dues'];
			}
			?>
		</div>
	</div>

	
	

	<div id="Final_report" class="tabcontent">
		<div id="img">
			<img src="img.jpg" width="100%" height="430px">
			<div id="upload"><input id="upload_file" type="button" value="Image"></div>
		</div>
		<div id="data"> 
			<?php
			if($row['librarian']==1 &&$row['warden']==1&&$row['dept_dues']==0)
			{
				echo "<span>No dues remaining</span>";
			}
			else
			{
				echo "<span>you still have dues reamining</span>";
			}
			?>
		</div>
	</div>
<!--////////////////////////////////////////////////////////////////////-->
<script>	
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>


</body>
</html>