<?php  
///////////////////////////////////////////////////////////////////////////// 
// 
// LOGIN PAGE 
// 
//   Server-side: 
//     1. Start a session
//     2. Clear the session
//     3. Generate a random challenge string
//     4. Save the challenge string in the session
//     5. Expose the challenge string to the page via a hidden input field
//
//  Client-side:
//     1. When the completes the form and clicks on Login button
//     2. Validate the form (i.e. verify that all the fields have been filled out)
//     3. Set the hidden response field to HEX(MD5(server-generated-challenge + user-supplied-password))
//     4. Submit the form
////////////////////////////////////////////////////////////////////////////////// 
session_start();
session_unset();
srand();
$challenge = "";
for ($i = 0; $i < 80; $i++) {
    $challenge .= dechex(rand(0, 15));
}
$_SESSION[challenge] = $challenge;

	include("dbconnect.php");
	include("header.inc.php");
?>
        <form id="loginForm" action="#" method="post">
            <div id="main-content">
				<div id="feature-content">
					<div id="feature-left">
						<h1><a href="#">Login</a></h1>
						<p>
							<table id="newspaper-a" summary="2007 Major IT Companies' Profit">
								<thead>
									<tr>
										<th scope="col"></th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									<?php if (isset($_REQUEST[error])) { ?>
									<tr>
										<td>Error</td>
										<td style="color: red;"><?php echo $_REQUEST[error]; ?></td>
									</tr>
									<?php } ?>
									<tr>
										<td>User Name:</td>
										<td><input type="text" name="username"/></td>
									</tr>
									<tr>
										<td>Password:</td>
										<td><input type="password" name="password"/></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>
											<input type="hidden" name="challenge" value="<?php echo $challenge; ?>"/>
											<input type="button" name="submit" value="Login" onclick="login();"/>
										</td>
									</tr>
								</tbody>
							</table>
						</p>
					</div>
					<div class="clear"></div>
				</div>
			</div>
        </form>
        <form id="submitForm" action="authenticate.php" method="post">
            <div>
                <input type="hidden" name="username"/>
                <input type="hidden" name="response"/>
            </div>
        </form>
<?php
	include("footer.inc.php");
?>