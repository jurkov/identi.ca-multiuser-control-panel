<?php
	include("dbconnect.php");
?>
User:<br>
<?php
	$ergebnis = mysql_query("SELECT * FROM ffvw_user");
	
	while($row = mysql_fetch_object($ergebnis))
	{
		echo $row->name." - ".$row->email."<br>";
	}
?>
Groups:<br>
<?php
	$ergebnis = mysql_query("SELECT * FROM ffvw_group");
	
	while($row = mysql_fetch_object($ergebnis))
	{
		echo $row->name."<br>";
	}
?>
Member of Group:<br>
<?php
	$ergebnis = mysql_query("SELECT ffvw_user.name AS u, ffvw_group.name AS g FROM ffvw_user LEFT JOIN ffvw_isgroup ON ffvw_user.id = ffvw_isgroup.userid RIGHT JOIN ffvw_group ON ffvw_group.id = ffvw_isgroup.groupid");
	
	while($row = mysql_fetch_object($ergebnis))
	{
		echo $row->u." - ".$row->g."<br>";
	}
?>
Account of Group:<br>
<?php
	$ergebnis = mysql_query("SELECT ffvw_acclogin.name AS a, ffvw_group.name AS g FROM ffvw_acclogin LEFT JOIN ffvw_isacc ON ffvw_acclogin.id = ffvw_isacc.accid RIGHT JOIN ffvw_group ON ffvw_group.id = ffvw_isacc.groupid");
	
	while($row = mysql_fetch_object($ergebnis))
	{
		echo $row->g." - ".$row->a."<br>";
	}

/*
SELECT ffvw_acclogin.name AS a,
       ffvw_group.name as g,
       ffvw_user.name as u
FROM ffvw_acclogin 
LEFT JOIN ffvw_isacc ON ffvw_acclogin.id = ffvw_isacc.accid 
RIGHT JOIN ffvw_group ON ffvw_group.id = ffvw_isacc.groupid
RIGHT JOIN ffvw_isgroup ON ffvw_group.id = ffvw_isgroup.groupid
RIGHT JOIN ffvw_user ON ffvw_user.id = ffvw_isgroup.userid WHERE ffvw_user.id =1
*/
?>