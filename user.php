<?php
	$uid = (int) $_GET['id'];
	include("logincheck.php");
	include("dbconnect.php");
	include("header.inc.php");
?>
		<div id="main-content">
			<div id="feature-content">
				<div id="feature-left">
					<h1><a href="#">Users</a></h1>
					<p>
						<table id="newspaper-a" summary="2007 Major IT Companies' Profit">
							<thead>
								<tr>
									<th scope="col">User</th>
									<th scope="col">Group</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if($uid!=0)
										$ergebnis = mysql_query("SELECT ffvw_user.name AS u, ffvw_group.name AS g FROM ffvw_user LEFT JOIN ffvw_isgroup ON ffvw_user.id = ffvw_isgroup.userid RIGHT JOIN ffvw_group ON ffvw_group.id = ffvw_isgroup.groupid WHERE ffvw_user.id=".$uid);
									else
										$ergebnis = mysql_query("SELECT ffvw_user.name AS u, ffvw_group.name AS g FROM ffvw_user LEFT JOIN ffvw_isgroup ON ffvw_user.id = ffvw_isgroup.userid RIGHT JOIN ffvw_group ON ffvw_group.id = ffvw_isgroup.groupid");
			
									while($row = mysql_fetch_object($ergebnis))
									{
										echo "<tr><td>".$row->u."</td><td>".$row->g."</td><td></td></tr>";
									}
								?>
							</tbody>
						</table>
					</p>
				</div>
				<div class="clear"></div>
			</div>
		</div>
<?php
	include("footer.inc.php");
?>