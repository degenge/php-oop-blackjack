<div class="flex flex-wrap -mx-3 mb-1" >

    <div class="w-full px-3 text-center" >
        <button type="submit" id="hit" name="action" value="hit" <?php echo ($player->hasLost()) ? 'style="display: none;"' : ''; ?>
                class="shadow bg-green-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >Hit
        </button >
        <button type="submit" id="stand" name="action" value="stand" class="shadow bg-green-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >Stand
        </button >
        <button type="submit" id="surrender" name="action" value="surrender"
                class="shadow bg-green-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >Surrender
        </button >
        <?php if ($player->hasLost()){ ?>
        <button type="submit" id="new" name="action" value="new"
                class="shadow bg-green-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >New
        </button >
        <?php } ?>
    </div >

</div >