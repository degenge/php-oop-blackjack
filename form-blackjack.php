<div class="w-full px-3 " >

    <?php
        $displayText = '';
        if ((isset($_POST['action']) && $_POST['action'] === Player::ACTION_STAND) || $blackjack->getPlayer()->hasLost()) {
            $displayText = 'style="display: none;"';
        }
    ?>

    <button type="submit" id="hit" name="action" value="hit" <?php echo $displayText; ?>
            class="shadow bg-green-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >Hit
    </button >

    <button type="submit" id="stand" name="action" value="stand" <?php echo $displayText; ?>
            class="shadow bg-green-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >Stand
    </button >

    <button type="submit" id="surrender" name="action" value="surrender" <?php echo $displayText; ?>
            class="shadow bg-green-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >Surrender
    </button >

    <?php if ($blackjack->getPlayer()->hasLost() || $blackjack->getDealer()->hasLost()) { ?>
        <button type="submit" id="new" name="new" value="new"
                class="shadow bg-green-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >New
        </button >
    <?php } ?>

</div >
