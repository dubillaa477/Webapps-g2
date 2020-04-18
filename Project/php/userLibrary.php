<?php
    include_once 'dbconnection.php';
    //include_once 'functions.php';
    $sql_getUsers  = "SELECT * FROM webappdb.libro";
    $gsend = $conn->prepare($sql_getUsers);
    $gsend->execute();
    $result = $gsend->fetchAll();
    //var_dump($result);
?>


<!DOCTYPE html>
<html lang="sp">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <title>Library</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Biblioteca</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.html">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="userLibrary.html">Mis libros
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="desplegaMsj()">Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <div style="height: 50px;"></div>
    <!--Page content--->

  <div class="container">
    
    <div class="row">
    <?php foreach ($result as $libro):?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <?php 
                        $img = $libro['portada'];
                        echo '<img class="card-img-top" src="data:portada;base64,'.$img.'">';
                    ?>
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php 
                            $title = $libro['nombre']; 
                            echo $title;
                            ?>
                        </h4>
                        <p class="card-text">
                            <?php 
                            $description = $libro['descripcion'];
                            echo $description;
                        ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div>
                </div>
                
            </div>
            <?php endforeach
            ?>
    </div>
      <!-- /.row -->
  </div>
  <!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Librería 2020</p>
  </div>
  <!-- /.container -->
</footer>
<?php
//mysql_close($conn);
?>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>