<?php

declare(strict_types=1);

spl_autoload_register(static function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

//require 'classes/Suit.php';
//require 'classes/Card.php';
//require 'classes/Deck.php';
//require 'classes/Player.php';
//require 'classes/Dealer.php';
//require 'classes/Blackjack.php';

session_start();
//var_dump($_SESSION);
//session_unset();
//session_destroy();
//die();

//
if (!isset($_SESSION["blackjack-deck"])) {
    $blackjack = new Blackjack();
    $_SESSION['blackjack-deck'] = serialize($blackjack->getDeck());
    $_SESSION['blackjack-player'] = serialize($blackjack->getPlayer());
    $_SESSION['blackjack-dealer'] = serialize($blackjack->getDealer());
    $player = $blackjack->getPlayer();
} else {
    var_dump($_SESSION['blackjack-deck']);
//    die;
    $blackjackDeck = unserialize($_SESSION['blackjack-deck'], ['allowed_classes' => true]);
    $blackjackPlayer = unserialize($_SESSION['blackjack-player'], ['allowed_classes' => true]);
    $blackjackDealer = unserialize($_SESSION['blackjack-dealer'], ['allowed_classes' => true]);
    $player = $blackjackPlayer;
}

//var_dump($_SESSION);

//$blackjack = $_SESSION['game'] ?? new Blackjack();
//$blackjack = new Blackjack();
//$player = $blackjack->getPlayer();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['hit'])) {
        $player->Hit();

    } elseif (isset($_POST['stand'])) {
        echo "stand";
    } else {
        echo "surrender";
    }
}


require('view_form.php');

