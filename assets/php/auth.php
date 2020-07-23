<?php
	//Start session
	session_start();
	//include("start_session.php");
    //Check whether the session variable SESS_MEMBER_ID is present or not|| (trim($_SESSION['USUARIO']) == '')
    function autentication()
    {
	if(isset($_SESSION['NOMBREUSUARIO']) )
        {
	
		header("Location:../index.php");
	
		var_dump('here iam');
		Header("Location: index.php");
		//ob_start();
		//header("Location: ../../index.php");
		//exit();
		?>
		<script>
			//alert(lvlroot); 
			window.location.href = lvlroot+'index.php';
		</script>
		<?php

		}

    }

	
	?>