<?php

declare(strict_types=1);

spl_autoload_register(static function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

session_start();
if (!isset($_SESSION['blackjack'])){
    $_SESSION['blackjack'] = serialize(new Blackjack());
}
//var_dump($_SESSION);
//session_unset();
//var_dump($_SESSION);
//die('Session cleared...');

//$_SESSION['blackjack'] = serialize(new Blackjack());
//var_dump($_SESSION);
//die;

$blackjack = unserialize($_SESSION['blackjack'], ['allowed_classes' => true]) ?? new Blackjack();
$player = $blackjack->getPlayer();

if (!empty($_POST['action'])) {
    switch ($_POST['action']) {
        case Player::ACTION_HIT:
            $player->hit($blackjack->getDeck());
            break;
        case Player::ACTION_STAND:
            echo 'stand';
            break;
        case Player::ACTION_SURRENDER:
            echo 'surrender';
            break;
        case Player::ACTION_NEW:
            session_destroy( );
            $_SESSION['blackjack'] = serialize(new Blackjack());
            break;
    }
}

$_SESSION['blackjack'] = serialize($blackjack);

require('view_form.php');

