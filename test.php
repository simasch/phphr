<?php include "Person.php"; ?>
<?php include "PersonDao.php"; ?>

<?php

$person = new Person(null, "Lisa");

$dao = new PersonDao();

$dao->insert($person);
$personFromDb = $dao->find(6);

echo $personFromDb->getId() . " " . $personFromDb->getName();

$personFromDb->setName("Fritz");
$personFromDb = $dao->update($personFromDb);

echo $personFromDb->getId() . " " . $personFromDb->getName();

$dao->close();

?>