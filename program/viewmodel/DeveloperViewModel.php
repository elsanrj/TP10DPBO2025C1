<?php
require_once 'model/Developer.php';

class DeveloperViewModel {
    private $developer;

    public function __construct() {
        $this->developer = new developer();
    }

    public function getDeveloperList() {
        return $this->developer->getAll();
    }

    public function getDeveloperById($id) {
        return $this->developer->getById($id);
    }

    public function addDeveloper($name, $location) {
        return $this->developer->create($name, $location);
    }

    public function updatedeveloper($id, $name, $location) {
        return $this->developer->update($id, $name, $location);
    }

    public function deletedeveloper($id) {
        return $this->developer->delete($id);
    }
}
?>