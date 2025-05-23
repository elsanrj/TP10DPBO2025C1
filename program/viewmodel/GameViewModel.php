<?php
require_once 'model/Game.php';
require_once 'model/Developer.php';
require_once 'model/Publisher.php';

class GameViewModel {
    private $game;
    private $developer;
    private $publisher;

    public function __construct() {
        $this->game = new Game();
        $this->developer = new Developer();
        $this->publisher = new Publisher();
    }

    public function getGameList() {
        return $this->game->getAll();
    }

    public function getGameById($id) {
        return $this->game->getById($id);
    }

    public function getDevelopers() {
        return $this->developer->getAll();
    }

    public function getPublishers() {
        return $this->publisher->getAll();
    }

    public function addGame($name, $description, $developer_id, $publisher_id) {
        return $this->game->create($name, $description, $developer_id, $publisher_id);
    }

    public function updateGame($id, $name, $description, $developer_id, $publisher_id) {
        return $this->game->update($id, $name, $description, $developer_id, $publisher_id);
    }

    public function deleteGame($id) {
        return $this->game->delete($id);
    }
}
?>