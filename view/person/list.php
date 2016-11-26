<html>
<head></head>

<body>

<table>
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

</body>
</html>