<?php
require_once 'viewmodel/GameViewModel.php';
require_once 'viewmodel/DeveloperViewModel.php';
require_once 'viewmodel/PublisherViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'game';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'game') {
    $viewModel = new GameViewModel();
    if ($action == 'list') {
        $gameList = $viewModel->getGameList();
        require_once 'views/game_list.php';
    } elseif ($action == 'add') {
        $developers = $viewModel->getDevelopers();
        $publishers = $viewModel->getPublishers();
        require_once 'views/game_form.php';
    } elseif ($action == 'edit') {
        $game = $viewModel->getGameById($_GET['id']);
        $developers = $viewModel->getDevelopers();
        $publishers = $viewModel->getPublishers();
        require_once 'views/game_form.php';
    } elseif ($action == 'save') {
        $viewModel->addGame($_POST['name'], $_POST['description'], $_POST['developer_id'], $_POST['publisher_id']);
        header('Location: index.php?entity=game');
    } elseif ($action == 'update') {
        $viewModel->updateGame($_GET['id'], $_POST['name'], $_POST['description'], $_POST['developer_id'], $_POST['publisher_id']);
        header('Location: index.php?entity=game');
    } elseif ($action == 'delete') {
        $viewModel->deleteGame($_GET['id']);
        header('Location: index.php?entity=game');
    }
} elseif ($entity == 'developer') {
    $viewModel = new DeveloperViewModel();
    if ($action == 'list') {
        $developerList = $viewModel->getDeveloperList();
        require_once 'views/developer_list.php';
    } elseif ($action == 'add') {
        require_once 'views/developer_form.php';
    } elseif ($action == 'edit') {
        $developer = $viewModel->getDeveloperById($_GET['id']);
        require_once 'views/developer_form.php';
    } elseif ($action == 'save') {
        $viewModel->addDeveloper($_POST['name'], $_POST['location']);
        header('Location: index.php?entity=developer');
    } elseif ($action == 'update') {
        $viewModel->updateDeveloper($_GET['id'], $_POST['name'], $_POST['location']);
        header('Location: index.php?entity=developer');
    } elseif ($action == 'delete') {
        $viewModel->deleteDeveloper($_GET['id']);
        header('Location: index.php?entity=developer');
    }
} elseif ($entity == 'publisher') {
    $viewModel = new PublisherViewModel();
    if ($action == 'list') {
        $publisherList = $viewModel->getPublisherList();
        require_once 'views/publisher_list.php';
    } elseif ($action == 'add') {
        require_once 'views/publisher_form.php';
    } elseif ($action == 'edit') {
        $publisher = $viewModel->getPublisherById($_GET['id']);
        require_once 'views/publisher_form.php';
    } elseif ($action == 'save') {
        $viewModel->addPublisher($_POST['name'], $_POST['location']);
        header('Location: index.php?entity=publisher');
    } elseif ($action == 'update') {
        $viewModel->updatePublisher($_GET['id'], $_POST['name'], $_POST['location']);
        header('Location: index.php?entity=publisher');
    } elseif ($action == 'delete') {
        $viewModel->deletePublisher($_GET['id']);
        header('Location: index.php?entity=publisher');
    }
}
?>
