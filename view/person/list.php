<html>
<head>
    <title>Person List</title>

    <?php
    include_once 'template/header.php';
    ?>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>People</h1>

            <table class="table table-bordered">
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                </tr>
                <?php

                foreach ($people as $person) {
                    echo '<tr>
                <td><a href="index.php?id=' . $person->getId() . '">' . $person->getId() . '</a></td>
                <td>' . $person->getName() . '</td>
              </tr>';
                }

                ?>
            </table>
        </div>
    </div>

</div>

<?php
include_once 'template/footer.php';
?>

</body>
</html>