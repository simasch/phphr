<?php

include_once 'model/Person.php';
include_once 'dao/PersonDao.php';

class PersonController
{
    private $personDao;

    public function __construct()
    {
        $this->personDao = new PersonDao();
    }

    public function invoke()
    {
        $message = '';

        if (isset($_POST['id'])) {

            $person = $this->personDao->find($_POST['id']);
            $person->setName($_POST['name']);
            $this->personDao->update($person);

            $message = 'Person saved';

            include 'view/person/edit.php';

        } else if (isset($_GET['id'])) {

            $person = $this->personDao->find($_GET['id']);
            include 'view/person/edit.php';

        } else {

            $people = $this->personDao->listPeople();
            include 'view/person/list.php';

        }
    }

}