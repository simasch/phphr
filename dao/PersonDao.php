<?php

include_once 'model/Person.php';

class PersonDao
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=hr', 'root', '');
    }

    public function close()
    {
        unset($this->pdo);
    }

    public function insert(Person $person)
    {
        $stmt = $this->pdo->prepare("INSERT INTO person(name) VALUES (?)");
        $stmt->bindParam(1, $person->getName());
        $stmt->execute();

        unset($stmt);
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT id, name FROM person WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $row = $stmt->fetch();
        $person = new Person($row["id"], $row["name"]);

        unset($stmt);

        return $person;
    }

    public function listPeople()
    {
        $stmt = $this->pdo->prepare("SELECT id, name FROM person ORDER BY id");
        $stmt->execute();

        $people = array();
        if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $person = new Person($row["id"], $row["name"]);
                $people[] = $person;
            }
        }

        unset($stmt);

        return $people;
    }

    public function update(Person $person)
    {
        $stmt = $this->pdo->prepare("UPDATE person SET name = ?  WHERE id = ?");
        $stmt->bindParam(1, $person->getName());
        $stmt->bindParam(2, $person->getId());
        $stmt->execute();

        unset($stmt);

        return $person;
    }
}