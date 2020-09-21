<?php

declare(strict_types=1);

session_start();

require 'Suit.php';
require 'Card.php';
require 'Deck.php';
require 'Blackjack.php';
//
//$deck = new Deck();
//$deck->shuffle();
//
//foreach ($deck->getCards() as $card) {
//    echo $card->getUnicodeCharacter(true);
//    echo '<br>';
//}


$blackjack = new Blackjack();
$player = $blackjack->getPlayer();



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['hit'])) {
        echo "hit";

    } elseif (isset($_POST['stand'])) {
        echo "stand";
    } else {
        echo "surrender";
    }
}


// ADD FIELDS TO SESSION
//$_SESSION["address-street"] = $addressStreet;

require('view_form.php');

