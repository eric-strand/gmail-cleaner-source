<?php
require('classes/Accounts.php');

$account->unsetCookie();
$account->unsetSession();

header('Location: ../index.php');
exit;
