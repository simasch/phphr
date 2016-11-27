<?php

include_once 'model/Person.php';
include_once 'dao/PersonDao.php';

include_once 'log4php/Logger.php';

class PersonController
{
    private $personDao;
    private $logger;

    public function __construct()
    {
        $this->personDao = new PersonDao();

        Logger::configure('log4php.xml');

        $this->logger = Logger::getLogger('PersonController');
    }

    public function invoke()
    {
        $this->logger->info("invoke()");

        $message = '';

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                if (isset($_GET['id'])) {
                    $person = $this->personDao->find($_GET['id']);
                    include 'view/person/edit.php';
                } else {
                    $people = $this->personDao->listPeople();
                    include 'view/person/list.php';
                }
                return;
            case 'POST':
                if (isset($_POST['id'])) {
                    $person = $this->personDao->find($_POST['id']);
                    $person->setName($_POST['name']);
                    $person = $this->personDao->update($person);

                    $message = 'Person saved';

                    include 'view/person/edit.php';
                }
                return;
            default:
                http_response_code(405);
                return;
        }
    }

}