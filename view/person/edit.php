<html>
<head></head>

<body>

<form action="index.php" method="post">

    <h1>Person <?php echo $person->getId(); ?></h1>

    Name: <input type="text" name="id" readonly value="<?php echo $person->getId(); ?>"/>
    Name: <input type="text" name="name" value="<?php echo $person->getName(); ?>"/>

    <button type="submit">Save</button>

</form>

<p><?php echo $message; ?></p>

</body>
</html>