<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test image</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        if(isset($_POST['submit'])){
            if (getimagesize($_FILES['image']['tmp_name'])==FALSE) {
                echo "failed";
            }
            else {
                $name=addslashes($_FILES['image']['name']);
                $image=base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
                saveimage($name,$image);
            }
        }

        function saveimage($name, $image){
            include_once 'dbconnection.php';
            try{
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE libro SET portada='$image', imgname='$name' WHERE id_libro=2";
            $gsend = $conn->prepare($sql);
            $gsend->execute();
            echo "Record created";
            }catch(PDOException $e){
                echo $sql. "<br>" .$e->getMessage();
            }
        }

        display();
        function display(){
        $con = mysqli_connect("localhost","root","","webapp-proyectodb");
        $sql_getImage = "SELECT * FROM libro";
        $gget = mysqli_query($con,$sql_getImage);
        $num=mysqli_num_rows($gget);
        
        for($i=0;$i<$num;$i++){
            $result = mysqli_fetch_array($gget);
            $img = $result['portada'];
            echo '<img src="data:portada;base64,'.$img.'">';
        }
        }
    ?>
</body>
</html>