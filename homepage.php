<?php
// if user is not logged on, redirect to login page
?>

<h1>Welcome</h1> <?php echo $_SESSION['user']; ?>
<p><a href="logout.php?logout='1'"><b><i class="fa fa-power-off" aria-hidden="true"></i>logout</b></a></b></p>
