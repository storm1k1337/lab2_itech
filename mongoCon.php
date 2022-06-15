<?php

require_once __DIR__ ."/vendor/autoload.php";

class Model {
    private $collection;

    public function __construct() {
        $this->collection = (new MongoDB\Client())->dbforlab->dbforlab;    
    }

    public function getProcessors() {
        return $this->collection->distinct('processor');
    }

    public function getSoftwares() {
        return $this->collection->distinct('software');
    }

    public function getItemByProcessor($processor) {
        return $this->collection->find(['processor' => $processor])->toArray();
    }

    public function getItemBySoftware($software) {
        return $this->collection->find(['software' => $software])->toArray();
    }

    public function getItemByExpired($date) {
        return $this->collection->find(['warrantyExpiredDate' => ['$lt' => $date]])->toArray();
    }
}

?>