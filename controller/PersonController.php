<?php

include_once 'model/Person.php';
include_once 'viewmodel/PersonEditViewModel.php';
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
        $this->logger->info("start");

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                if (isset($_GET['action'])) {
                    switch ($_GET['action']) {
                        case 'new':
                            $this->add();
                            break;
                        case 'edit':
                            if (isset($_GET['id'])) {
                                $this->getById($_GET['id']);
                            }
                            break;
                        default:
                            break;
                    }
                } else {
                    $this->getAll();
                }
                break;
            case 'POST':
                $this->post($_POST['id'], $_POST['name']);
                break;
            default:
                http_response_code(405);
                break;
        }
    }

    private function add()
    {
        $vm = new PersonEditViewModel();
        $vm->setPerson(new Person(null, ''));
        $vm->setMessage('');

        include 'view/person/edit.php';
    }

    private function getById($id)
    {
        $vm = new PersonEditViewModel();
        $vm->setPerson($this->personDao->find($id));

        $vm->setMessage('');

        include 'view/person/edit.php';
    }

    private function getAll()
    {
        $people = $this->personDao->listPeople();

        include 'view/person/list.php';
    }

    private function post($id, $name)
    {
        $vm = new PersonEditViewModel();
        if ($id == null) {
            $person = new Person(null, $name);
            $person = $this->personDao->insert($person);

            $vm->setPerson($person);
            $vm->setMessage('Person created');
        } else {
            $person = $this->personDao->find($id);
            $person->setName($name);
            $person = $this->personDao->update($person);

            $vm->setPerson($person);
            $vm->setMessage('Person saved');
        }

        include 'view/person/edit.php';
    }

}