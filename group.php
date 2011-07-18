<?php
	include("logincheck.php");
	include("dbconnect.php");
	include("header.inc.php");
?>
		<div id="main-content">
			<div id="feature-content">
				<div id="feature-left">
					<h1><a href="#">Groups</a></h1>
					<p>
						<table id="newspaper-a" summary="2007 Major IT Companies' Profit">
							<thead>
								<tr>
									<th scope="col">Group</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
										$ergebnis = mysql_query("SELECT * FROM ffvw_group");
			
										while($row = mysql_fetch_object($ergebnis))
										{
											echo "<tr><td>".$row->name."</td><td></td></tr>";
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