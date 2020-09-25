<?php

declare(strict_types=1);

spl_autoload_register(static function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

session_start();
//var_dump($_SESSION);
//session_unset();
//var_dump($_SESSION);
//die('Session cleared...');

if (isset($_POST['new'])) {
    unset($blackjack);
    session_unset();
}

if (!isset($_SESSION['blackjack'])) {
    $blackjack             = new Blackjack();
    $_SESSION['blackjack'] = serialize($blackjack);
} else {
    $blackjack = unserialize($_SESSION['blackjack'], [Blackjack::class]);
}

//$blackjack = unserialize($_SESSION['blackjack'], ['allowed_classes' => true]) ?? new Blackjack();

if (!empty($_POST['action'])) {
    switch ($_POST['action']) {
        case Player::ACTION_HIT:
            if (!$blackjack->getPlayer()->hasLost()) {
                $blackjack->getPlayer()->hit($blackjack->getDeck());
            }
            $_SESSION['blackjack'] = serialize($blackjack);
            break;
        case Player::ACTION_STAND:
            $blackjack->getPlayer()->setStand(true);
            $blackjack->getDealer()->hit($blackjack->getDeck());
            // Check score
            if (($blackjack->getDealer()->getScore() <= 21) && ($blackjack->getDealer()->getScore() > $blackjack->getPlayer()->getScore())) {
                $blackjack->getPlayer()->setLost(true);

            } else {
                $blackjack->getDealer()->setLost(true);
            }
            $_SESSION['blackjack'] = serialize($blackjack);
            break;
        case Player::ACTION_SURRENDER:
            $blackjack->getPlayer()->setLost(true);
            break;
    }
}

require('view_form.php');

