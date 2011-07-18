<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Digg Header by CSS-Tricks</title>
	
	<link rel="stylesheet" type="text/css" href="style.css" />
	
	<script type="text/javascript" src="js/jquery.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
		   $("#zone-bar li em").click(function() {
		   		var hidden = $(this).parents("li").children("ul").is(":hidden");
		   		
				$("#zone-bar>ul>li>ul").hide()        
			   	$("#zone-bar>ul>li>a").removeClass();
			   		
			   	if (hidden) {
			   		$(this)
				   		.parents("li").children("ul").toggle()
				   		.parents("li").children("a").addClass("zoneCur");
				   	} 
			   });
		});
	</script>
	<script type="text/javascript" src="js/md5.js"></script>
        <script type="text/javascript">
            function login() {
                var loginForm = document.getElementById("loginForm");
                if (loginForm.username.value == "") {
                    alert("Please enter your user name.");
                    return false;
                }
                if (loginForm.password.value == "") {
                    alert("Please enter your password.");
                    return false;
                }
                var submitForm = document.getElementById("submitForm");
                submitForm.username.value = loginForm.username.value;
                submitForm.response.value = 
                    hex_md5(loginForm.challenge.value+hex_md5(loginForm.password.value));
					//alert(submitForm.response.value);
                submitForm.submit();
            }
        </script>
</head>

<body>

	<div id="page-wrap">

		<div id="top-bar">
			<img src="images/logo.png" alt="DZone" class="floatleft" />
			<div id="right-side">
<?php
	if($userid!=0)
	{
		$ergebnis = mysql_query("SELECT ffvw_user.id as iu, ffvw_user.name as nu FROM ffvw_user WHERE ffvw_user.id = ".$userid.";");
		
		while($row = mysql_fetch_object($ergebnis))
		{
			echo '<img src="images/usericon.jpg" alt="user icon" />&ensp;';
			echo '<a href="user.php?id='.$row->iu.'" class="first">'.$row->nu.'</a>&ensp;';
			echo '<a href="login.php">Logout</a> &emsp;';
		}
	}
	else
	{
		echo '<a href="login.php" class="first">Login</a> &emsp;';
	}
?>
				<form id="main-search">
							<label for="search-field" id="search-field-label">Search</label>
							<input type="text" tabindex="1" maxlength="255" id="search-field"/>
							<input type="image" alt="Search" value="Search" src="images/search.png" id="search-button"/>  
				</form>
			</div>
		</div>
		
		<div id="zone-bar">
			<ul>
<?php
	if($userid!=0)
	{
?>
				<li>
					<a href="#"><span>
						Actions &nbsp;
						<em class="opener-technology">
							<img src="images/zonebar-downarrow.png" alt="dropdown" />
						</em>
					</span></a>
					<ul class="technologysublist">
<?php
		$sql = "SELECT ffvw_acclogin.name AS na, ffvw_acclogin.id AS ia, 
								   ffvw_group.name as ng,
								   ffvw_user.name as nu
							FROM ffvw_acclogin 
							LEFT JOIN ffvw_isacc ON ffvw_acclogin.id = ffvw_isacc.accid 
							RIGHT JOIN ffvw_group ON ffvw_group.id = ffvw_isacc.groupid
							RIGHT JOIN ffvw_isgroup ON ffvw_group.id = ffvw_isgroup.groupid
							RIGHT JOIN ffvw_user ON ffvw_user.id = ffvw_isgroup.userid WHERE ffvw_user.id = ".$userid.";";
							//echo $sql;
		$ergebnis = mysql_query($sql);
		$ergebnis_num = mysql_num_rows($ergebnis);
		if($ergebnis_num>0)
		{
			while($row = mysql_fetch_object($ergebnis))
			{
				echo '<li><a href="update.php?id='.$row->ia.'">Status Update "'.$row->na.'"</a></li>';
			}
			echo '<li><a href="update.php?id=0">Status Update ALL</a></li>';
		}
		else
		{
			echo '<li><a href="#">No Account</a></li>';
		}
?>
					</ul>
				</li>
				<li>
					<a href="#"><span>
						Options &nbsp;
						<em class="opener-world">
							<img src="images/zonebar-downarrow.png" alt="dropdown" />
						</em>
					</span></a>
					<ul class="worldsublist">
						<li><a href="user.php">Users</a></li>
						<li><a href="group.php">Groups</a></li>
						<li><a href="account.php">Accounts</a></li>
					</ul>
				</li>
<?php
	}
	else
	{
?>
				<li>
					<a href="login.php"><span>
						Login &nbsp;
						<em class="opener-world">
							<img src="images/zonebar-downarrow.png" alt="dropdown" />
						</em>
					</span></a>
				</li>
<?php
	}
?>
			</ul>
		</div>