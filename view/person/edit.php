<html>
<head>
    <title>Person Editor</title>

    <?php
    $root = dirname(__FILE__) . "/../..";

    include_once "$root/view/template/header.php";
    ?>
</head>


<body>

<?php
include_once "$root/view/template/navbar.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Person <?php echo $vm->getPerson()->getId(); ?></h1>

            <form action="index.php" method="post">

                <div class="form-group">
                    <label for="id">Id</label>
                    <input id="id" name="id" type="text" class="form-control"
                           value="<?php echo $vm->getPerson()->getId(); ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" class="form-control"
                           value="<?php echo $vm->getPerson()->getName(); ?>">
                </div>

                <button type="submit" class="btn btn-default">Save</button>
                &nbsp;&nbsp;<a href="index.php">Back</a>

            </form>

            <p><?php echo $vm->getMessage(); ?></p>
        </div>
    </div>
</div>

<?php
include_once "$root/view/template/footer.php";
?>

</body>
</html>