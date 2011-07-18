<?php
	$aid = (int) $_GET['id'];
	include("logincheck.php");
	include("dbconnect.php");
	include("header.inc.php");
	//require_once("identica.lib.php") or die("<b>Couldn't load Identi.ca library</b>");
	include("identica.lib.php");
?>
		<div id="main-content">
			<div id="feature-content">
				<div id="feature-left">
					<h1><a href="#">Action - Update</a></h1>
					<p>
						<form method="post">
							<table id="newspaper-a" summary="2007 Major IT Companies' Profit">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col"></th>
										<th scope="col">Account</th>
										<th scope="col">Status</th>
										<th scope="col">New Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
										if($aid!=0)
										{
											//$ergebnis = mysql_query("SELECT * FROM  `ffvw_acclogin` WHERE id=".$uid);
											$sql = "SELECT ffvw_acclogin.name AS na, ffvw_acclogin.id AS ia, 
												   ffvw_group.name as ng,
												   ffvw_user.name as nu,
												   ffvw_acclogin.user as ua,
												   ffvw_acclogin.pass as pa
											FROM ffvw_acclogin 
											LEFT JOIN ffvw_isacc ON ffvw_acclogin.id = ffvw_isacc.accid 
											RIGHT JOIN ffvw_group ON ffvw_group.id = ffvw_isacc.groupid
											RIGHT JOIN ffvw_isgroup ON ffvw_group.id = ffvw_isgroup.groupid
											RIGHT JOIN ffvw_user ON ffvw_user.id = ffvw_isgroup.userid WHERE ffvw_user.id = ".$userid." and ffvw_acclogin.id = ". $aid .";";
										}
										else
										{
											$sql = "SELECT ffvw_acclogin.name AS na, ffvw_acclogin.id AS ia, 
												   ffvw_group.name as ng,
												   ffvw_user.name as nu,
												   ffvw_acclogin.user as ua,
												   ffvw_acclogin.pass as pa
											FROM ffvw_acclogin 
											LEFT JOIN ffvw_isacc ON ffvw_acclogin.id = ffvw_isacc.accid 
											RIGHT JOIN ffvw_group ON ffvw_group.id = ffvw_isacc.groupid
											RIGHT JOIN ffvw_isgroup ON ffvw_group.id = ffvw_isgroup.groupid
											RIGHT JOIN ffvw_user ON ffvw_user.id = ffvw_isgroup.userid WHERE ffvw_user.id = ".$userid.";";
										}
										
										$ergebnis = mysql_query($sql);
										$ergebnis_num = mysql_num_rows($ergebnis);
										if($ergebnis_num>0)
										{
											while($row = mysql_fetch_object($ergebnis))
											{
												$identica[$row->na] = new Identica($row->ua, $row->pa);
												if($_POST[$row->ia]['check'] == "on" && $_POST[$row->ia]['update_new']!="")
												{
													$identica[$row->na]->updateStatus(htmlspecialchars($_POST[$row->ia]['update_new']));
												}
												
												$obj = json_decode($identica[$row->na]->getUserTimeline("json"));
												//print_r($obj);
												echo "<tr><td><input type='checkbox' name='".$row->ia."[check]' value='on' checked='yes'></td><td><a href='".$obj[0]->user->statusnet_profile_url."'><img src='".$obj[0]->user->profile_image_url."' height='32' width='32' border='0'></a></td><td>".$row->na."</td><td><textarea name='".$row->ia."[update_old]' cols='30' rows='2' readonly>".$obj[0]->text."</textarea></td><td><textarea name='".$row->ia."[update_new]' cols='30' rows='2'></textarea></td></tr>";
											}
										}
									?>
								</tbody>
							</table>
							<input type="submit" name="submit" value="Update!" />
						</form>
					</p>
				</div>
				<div class="clear"></div>
			</div>
		</div>
<?php
	include("footer.inc.php");
?>