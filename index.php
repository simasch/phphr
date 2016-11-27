<html>
<head>
    <title>Index</title>

    <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]) . "/hr";

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

            <h1>Hi</h1>

            <ul class="list-group">
                <li class="list-group-item"><a href="view/person/index.php">People</a></li>
            </ul>
        </div>
    </div>
</div>

<?php
include_once "$root/view/template/footer.php";
?>

</body>
</html>