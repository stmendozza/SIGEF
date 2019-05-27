<header id="header1">
	<div class="container-fluid">
		<div class="row">
           <div class="col-4 col-sm-1">
            <a class="logosigef" href="../index.php"> 
                <svg viewBox="220 0 960 165">
                    <symbol id="s-text">
                        <text text-anchor="middle" x="50%" y="80%">SIGEF</text>
                    </symbol>

                    <g class = "g-ants">
                        <use xlink:href="#s-text" class="text-copy"></use>
                        <use xlink:href="#s-text" class="text-copy"></use>
                        <use xlink:href="#s-text" class="text-copy"></use>
                        <use xlink:href="#s-text" class="text-copy"></use>
                        <use xlink:href="#s-text" class="text-copy"></use>
                    </g>
                </svg>
            </a>
        </div>
        <div class="col-2 col-sm-5">
        </div>
        <div class="col-6 col-sm-6 ">   
            <ul  class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <span  style="position: absolute;padding:0px; margin: 4px 20px; font-size: 12px; font-weight: bold; line-height: 1; color: red; z-index: 3; white-space: nowrap; vertical-align: baseline; background-color:white; " class="badge ">98</span>
                    <a style="position: relative;" class="dropdown-toggle" data-toggle="dropdown" href="#">

                        <i style="position: relative;" class="fal fa-bell icon icon1  fa-fw"></i>
                        
                        <i class="glyphicon glyphicon-triangle-bottom icon1"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fal fa-user icon  icon7"></i> 
                        <i class="glyphicon glyphicon-triangle-bottom icon7"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usuario.php"><i class="fa fa-user fa-fw"></i><?php echo $_SESSION['usuario']; ?></a>
                        </li>
                        <li><a href="configuraciones.php"><i class="fa fa-gear fa-fw"></i>Configuraciones</a>
                        </li>
                        <li><a target="_blank" href="pdf/ayuda.pdf"><i class="fa fa-question fa-fw"></i>Ayuda</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
        </div> 	
    </div>
</div>	
</header>
<header><span style="font-size: 25px; padding: 2.5px 15px 2.5px;" class="fal fa-bars show"></span></header>   