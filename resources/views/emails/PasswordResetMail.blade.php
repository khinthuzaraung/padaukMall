<?php
$resetcode=Session::get('random');
?>
<h3>Hi,</h3> 
<p>Your password code is here <?php echo $resetcode;?>.</p>