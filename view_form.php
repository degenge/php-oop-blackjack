<?php

//require 'Player.php';

?>

<!DOCTYPE html>
<html lang="en" >

<head >
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css" />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer ></script >

    <title >PHP OOP Blackjack</title >
</head >

<body class="" >

<div class="" >

    <header class="bg-gray-200" >

        <div class="container mx-auto px-6 py-3" >

            <div class="flex items-center justify-between" >
                <div class="w-full text-green-700 md:text-center text-5xl font-semibold" >Blackjack Company</div >
            </div >

        </div >

    </header >

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6" >

        <div class="flex flex-wrap -mx-3 mt-4 mb-2" >

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" >

                <?php
                foreach ($blackjack->getPlayer()->getCards() as $card) {
                    echo '<span style="font-size: 100px;">' . $card->getUnicodeCharacter(true) . '</span>';
                }
                ?>

                <p style="font-size: 20px;" >Your score: <?php echo $blackjack->getPlayer()->getScore(); ?></p >
                <?php if ($blackjack->getPlayer()->hasLost()) { ?>
                    <p style="font-size: 20px;" >You lost!</p >
                <?php } ?>

            </div >

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" >

                <?php
                if ($blackjack->getPlayer()->isStand()) {
                    foreach ($blackjack->getDealer()->getCards() as $card) {
                        echo '<span style="font-size: 100px;">' . $card->getUnicodeCharacter(true) . '</span>';
                    }
                    ?>

                    <p style="font-size: 20px;" >Dealer score: <?php echo $blackjack->getDealer()->getScore(); ?></p >
                    <?php if ($blackjack->getDealer()->hasLost()) { ?>
                        <p style="font-size: 20px;" >Dealer lost!</p >
                    <?php } ?>
                    <?php
                }
                ?>
            </div >
        </div >

        <div class="flex flex-wrap -mx-3 mt-4 mb-2" >

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="" >

                <?php require('form-blackjack.php'); ?>

            </form >

        </div >

    </main >

    <footer class="bg-gray-200" >
        <div class="container mx-auto px-6 py-3 flex justify-between items-center" >
            <p class="py-2 text-gray-500 sm:py-0" >Blackjack Company 2020</p >
            <p class="py-2 text-gray-500 sm:py-0" >All rights reserved</p >
        </div >
    </footer >

</div >

</body >

</html >