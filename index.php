<?php

declare(strict_types=1);

spl_autoload_register(static function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

session_start();

$blackjack = unserialize($_SESSION['blackjack'], ['allowed_classes' => true]) ?? new Blackjack();
$player = $blackjack->getPlayer();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // TODO: one action var in post
    if (isset($_POST['hit'])) {
        var_dump($_POST);
        $player->Hit();

    } elseif (isset($_POST['stand'])) {
        echo "stand";
    } else {
        echo "surrender";
    }
}

$_SESSION['blackjack'] = serialize($blackjack);

require('view_form.php');

