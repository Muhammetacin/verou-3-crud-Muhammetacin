<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types=1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

$databaseManager = new DatabaseManager(getenv(host), getenv('user'), getenv['password'], getenv['database']);
$databaseManager->connect();

// This example is about a Pokémon card collection
// Update the naming if you'd like to work with another collection
$cardRepository = new CardRepository($databaseManager);
$cards = $cardRepository->get();
$firstCard = $cardRepository->find(1);

// Get the current action to execute
// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;

// Load the relevant action
// This system will help you to only execute the code you want, instead of all of it (or complex if statements)
switch ($action) {
    case 'Create':
        create($cardRepository);
        break;
    case 'Update':
        update($cardRepository);
        break;
    case 'Delete':
        delete($cardRepository);
        break;
    case 'Filter':
        filter($cardRepository, $cards);
        break;
    default:
        overview($cardRepository, $cards);
        break;
}

if (!empty($_POST['name']) && isset($_POST['create'])) {
    $cardRepository->create($_POST['name'], $_POST['type']);
    header("location: success.php");
}

function overview($cardRepository, $cards)
{
    require 'overview.php';
}

function create($cardRepository)
{
    if(isset($_GET['name']) && isset($_GET['type'])) {
        $cardRepository->create($_GET['name'], $_GET['type']);
        header("location: success.php?name=" . $_GET['name'] . "&type=" . $_GET['type']);
        return;
    }

    require 'create.php';
}

function update($cardRepository)
{
    if(isset($_GET['name']) && isset($_GET['type'])) {
        $cardRepository->update(intval($_GET['id']), $_GET['name'], $_GET['type']);
//        header("location: success_edit.php");
        header("refresh:1; index.php");
    }
    var_dump($_GET);

    $getPokemon = $cardRepository->find(intval($_GET['id']));
    var_dump($getPokemon);
    require 'edit.php';
}

function delete($cardRepository)
{
    if(isset($_GET['id'])) {
        $cardRepository->delete(intval($_GET['id']));
    }
    require 'delete.php';
}

function filter($cardRepository, $cards) {
//    var_dump($_GET['type']);
    if(isset($_GET['type'])) {
        $cards = $cardRepository->getFiltered($_GET['type']);
    }
    require 'overview.php';
}