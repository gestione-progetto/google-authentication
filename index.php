<?php

require_once 'app/init.php';

$db = new DB;
$googleClient = new Google_Client;

$auth = new GoogleAuth($db, $googleClient);

echo $authUrl = $auth->checkToken();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Google Authentication Test</title>
    </head>
    <body>
        <?php if($authUrl): ?>
            <a href="<?=$authUrl?>">Sign in with Google</a>
        <?php else: ?>
            You are logged in.<a href="logout.php">Log out</a>
        <?php endif;?>
    </body>
</html>
