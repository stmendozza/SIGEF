
<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="interface.php">HOME</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="">Novedad <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="abastecimiento.php">Abastecimiento</a></li>
            <li><a href="Productos.php">Productos</a></li>
            <li><a href="ventas.php">Ventas</a></li>
            
          </ul>
        </li>
        
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="ventas.php">Registros <span class="caret"></span></a>
          <ul class="dropdown-menu">
            
            <li><a href="registroalmacenistas.php">Almacenistas</a></li>
            <li><a href="registroclientes.php">Clientes</a></li>
            <li><a href="registrovendedores.php">Vendedores</a></li>
            
          </ul>
        </li>

			<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="">Planilla Stock <span class="caret"></span></a>
					 <ul class="dropdown-menu">
            <li><a href="#">Generar</a></li>
            <li><a href="Stocktienda.php">Visualizar</a></li>
            
          </ul>
			</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="cambiarpass.php"><span class="glyphicon glyphicon-user"></span><strong><?=$_SESSION['usuario'] ?></strong> </a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
