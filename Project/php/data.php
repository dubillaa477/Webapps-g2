<?php
    include_once 'dbconnection.php';
    $sql_getUsers  = "SELECT * FROM libro";
    $gsend = $conn->prepare($sql_getUsers);
    $gsend->execute();
    $result = $gsend->fetchAll();
    var_dump($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
   <!-- Custom styles for this template -->
   <link href="css/shop-homepage.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
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
            <?php endforeach?>
        </div>
    </div>
</body>
</html>