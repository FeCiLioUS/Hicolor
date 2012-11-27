<?php
ob_start();
session_start();
?>

<head>
<title>Secure Images Demo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php
function Form() {
        ?>
        <form method="post">
        Please sign up for our website:<br /><br />
        Your Name: <input name="name" type="text" size="25" /> <br /><br />
        <img alt="Security Image" src="securityimage.php" /><br/ ><br/ >
        Enter what you see: <input name="securityImageValue" type="text" size="15" /><br /><br />
        <input type="submit" name="Submit" value="Signup!" />
        </form>
        <?php
}

if (isset($_POST['securityImageValue']) && isset($_SESSION['strSec'])) {
        if (md5($_POST['securityImageValue']) == $_SESSION['strSec']) {
                session_destroy();
                print 'You correctly enetered the security image text. Goody for you.';
        }
        else {
                print 'The text you entered does not match the security image you saw. Please try again.<br /><br />';
                Form();
        }
}
else
        Form();
?>

</body>
</html>

<?php
ob_end_flush();
?>