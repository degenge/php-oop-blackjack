<?php
declare(strict_types=1);

class Dealer extends Player
{

    public function hit(Deck $deck) :array
    {
        $dealerCards = [];
        while ($this->getScore() <= 15) {
            $dealerCards[] = parent::hit($deck);
        }
        if ($this->getScore() > 21) {
            $this->setLost(true);
        }
        return $dealerCards;
    }
}