<?php
declare(strict_types=1);

class Player
{
    private array $cards;
    private bool $lost = false;

    /**
     * Player constructor.
     * @param Deck $deck
     */
    public function __construct(Deck $deck)
    {
        $playerCard1 = $deck->drawCard();
        $playerCard2 = $deck->drawCard();
        $this->cards = [$playerCard1, $playerCard2];
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    public function Hit(Deck $deck): array
    {
        $this->cards[] = $deck->drawCard();
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