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
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    public function Hit(): array
    {
        $this->cards[] = $this->deck->drawCard();
        return $this->cards;
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