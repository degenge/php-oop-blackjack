<?php
declare(strict_types=1);

class Player
{
    private array $cards;
    private bool $lost = false;
    private Deck $deck;

    /**
     * Player constructor.
     * @param Deck $deck
     */
    public function __construct(Deck $deck)
    {
        $this->deck = $deck;
        $playerCard1 = $this->deck->drawCard();
        $playerCard2 = $this->deck->drawCard();
        $this->cards = [$playerCard1, $playerCard2];
        $_SESSION["blackjack-player-cards"] = $this->cards;
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
//        return $this->cards;
        return $_SESSION["blackjack-player-cards"];
    }

    public function Hit(): array
    {
        $temp = $this->getCards();
        $temp[] = $this->deck->drawCard();
        return $temp;
    }

    public function Surrender(): void
    {

    }

    public function getScore(): void
    {

    }

    public function hasLost(): void
    {

    }

}