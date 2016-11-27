<html>
<head>
    <title>Person List</title>

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

            <h1>People</h1>

            <p><a href="index.php?action=new">Add person</a></p>

            <table class="table table-bordered">
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                </tr>
                <?php

                foreach ($people as $person) {
                    echo '<tr>
                <td><a href="index.php?action=edit&id=' . $person->getId() . '">' . $person->getId() . '</a></td>
                <td>' . $person->getName() . '</td>
              </tr>';
                }

                ?>
            </table>
        </div>
    </div>

</div>

<?php
include_once "$root/view/template/footer.php";
?>

</body>
</html>