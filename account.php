<?php
	include("logincheck.php");
	include("dbconnect.php");
	include("header.inc.php");
?>
		<div id="main-content">
			<div id="feature-content">
				<div id="feature-left">
					<h1><a href="#">Accounts</a></h1>
					<p>
						<table id="newspaper-a" summary="2007 Major IT Companies' Profit">
							<thead>
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Account</th>
									<th scope="col">Type</th>
									<th scope="col">Group</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$ergebnis = mysql_query("SELECT ffvw_acclogin.name AS a, ffvw_acclogin.type AS t, ffvw_acclogin.user AS u, ffvw_group.name AS g FROM ffvw_acclogin LEFT JOIN ffvw_isacc ON ffvw_acclogin.id = ffvw_isacc.accid RIGHT JOIN ffvw_group ON ffvw_group.id = ffvw_isacc.groupid");
		
								while($row = mysql_fetch_object($ergebnis))
								{
									echo "<tr><td>".$row->a."</td><td>".$row->u."</td><td>".$row->t."</td><td>".$row->g."</td><td></td></tr>";
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