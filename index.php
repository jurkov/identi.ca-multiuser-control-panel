<?php
	include("logincheck.php");
	include("dbconnect.php");
	include("header.inc.php");
?>
		<div id="main-content">
			<div id="feature-content">
				<div id="feature-left">
					<h1><a href="#">Welcome to Identi.ca MUM</a></h1>
					<p>
						Identi.ca MUM is a Identi.ca multiuser managment tool.
					</p>
					<h1><a href="#">Shortlinks</a></h1>
					<p>
						<a href="user.php">User</a><br>
						<a href="group.php">Group</a><br>
						<a href="account.php">Account</a><br>
						<br>
						<a href="update.php">Status Update</a>
					</p>
				</div>
				<div class="clear"></div>
			</div>
		</div>
<?php
	include("footer.inc.php");
?>