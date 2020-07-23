
<?php
	include("assets/php/start_sesion.php");
	session_start();
	$usuario=$_SESSION['NOMBREUSUARIO'];
	$id=$_SESSION['IDUSUARIO'];
?>
<body class="flat-black pace-done">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade in  page-sidebar-fixed page-header-fixed gradient-enabled">
		<!-- begin #header -->
            <div id="header" class="header navbar navbar-fixed-top navbar-inverse">
			<!-- begin container-fluid -->
                <div class="container-fluid">
                <!-- begin mobile sidebar expand / collapse button -->
                <div class="navbar-header" >
                     <!--<a href="index.php" class="navbar-brand"><img src="orionlogo.png" alt="Orion" style="width:160px;margin: auto;padding: 0;margin-top: 5px;"/> </a>-->
                         <a href="<?php echo $lvlroot; ?>./Home/home.php" class="navbar-brand" style="background: black"><img src="<?php echo $lvlroot;?>assets/img/" alt="PTR" style="width:60px;margin: auto;padding: 0;margin-top: 50px;"/> </a>

                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                <!-- end mobile sidebar expand / collapse button -->
                
                <!-- begin header navigation right -->
                <ul class="nav navbar-nav navbar-right">
                   
                    <li>
                        <a>
                        <div class="headline text-center" id="time"></div>
                        </a>
                    </li>
                    <li class="dropdown">
                   <!--     <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                            <i class="fa fa-bell-o"></i>
                            <span class="label">5</span>
                        </a>
                       <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                            <li class="dropdown-header">Notifications (5)</li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Server Error Reports</h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">				    <li><a href="<?php echo $lvlroot ?>"./Home/exit.php>Cerrar Sesión</a>

                                    <div class="media-left"><img src="<?php echo $lvlroot;?>assets/img/user-1.jpg" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">John Smith</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">25 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="<?php echo $lvlroot;?>assets/img/user-2.jpg" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Olivia</h6>
						   
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">35 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New User Registered</h6>
                                        <div class="text-muted f-s-11">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New Email From John</h6>
                                        <div class="text-muted f-s-11">2 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
                        </ul>
                    </li>-->
                    <li class="dropdown navbar-user">
			
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $lvlroot;?>assets/img/logopl.jpg" alt="" /> 
                            <span class="hidden-xs"><?php echo $usuario;?></span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li class="arrow"></li>
                            <li><a href="<?php echo $lvlroot; ?>./RegistroUsuarios/editarUsuario/editar.php?id=<?php echo $id;?>">Editar Usuario</a>

				    </li>

                           <!-- <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>-->
            
                            <!--<li class="divider"></li>-->
				    <li><a href="<?php echo $lvlroot; ?>./Home/exit.php">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- end header navigation right -->
            </div>
            <!-- end container-fluid -->
		</div>
		<!-- end #header-->
		<!-- begin #content -->
		<div id="content" class="content">

<!-- begin Clock -->
<script type="text/javascript">
$(function() {
    startTime();
    /*$(".center").center();
    $(window).resize(function() {
        $(".center").center();
    });*/
});

/*  */
function startTime()
{
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();

    // add a zero in front of numbers<10
    m = checkTime(m);
    s = checkTime(s);
    
    //Check for PM and AM
    var day_or_night = (h > 11) ? "PM" : "AM";

    //Convert to 12 hours system
    if (h > 12)
        h -= 12;

    //Add time to the headline and update every 500 milliseconds
    $('#time').html(h + ":" + m + ":" + s + " " + day_or_night);
    setTimeout(function() {
        startTime()
    }, 500);
}

function checkTime(i)
{
    if (i < 10)
    {
        i = "0" + i;
    }
    return i;
}
</script>
<!-- end Clock -->
