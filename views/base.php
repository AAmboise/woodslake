<?php 
ini_set('display_errors',true);
require_once './models/models.php';
require_once './controllers/controllers.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title><?=$titre?></title>
    <?=$css?>

</head>
<body>
    
    <div class='container-fluid'>

        <div class="row">
            <?php 
                require_once './views/template/header.php';
                $menu ? require_once './views/template/nav.php' : false;
            ?>
        </div>

        <div class='row main'>
            <?=$content?>
        </div>

        <div class="row">
            <?php
            require_once './views/template/footer.php';
            ?>
        </div>
        
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>