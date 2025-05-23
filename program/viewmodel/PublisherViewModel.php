<?php
require_once 'model/Publisher.php';

class PublisherViewModel {
    private $publisher;

    public function __construct() {
        $this->publisher = new publisher();
    }

    public function getPublisherList() {
        return $this->publisher->getAll();
    }

    public function getPublisherById($id) {
        return $this->publisher->getById($id);
    }

    public function addPublisher($name, $location) {
        return $this->publisher->create($name, $location);
    }

    public function updatePublisher($id, $name, $location) {
        return $this->publisher->update($id, $name, $location);
    }

    public function deletePublisher($id) {
        return $this->publisher->delete($id);
    }
}
?>