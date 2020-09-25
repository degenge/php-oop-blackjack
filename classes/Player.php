<?php
declare(strict_types=1);

class Player
{
    public const ACTION_HIT = 'hit';
    public const ACTION_STAND = 'stand';
    public const ACTION_SURRENDER = 'surrender';
    public const ACTION_NEW = 'new';
    protected bool $lost;
    private array $cards;
//    private bool $lost = false;
    private bool $stand;
    private int $score;

    /**
     * Player constructor.
     * @param Deck $deck
     */
    public function __construct(Deck $deck)
    {
        $playerCard1 = $deck->drawCard();
        $playerCard2 = $deck->drawCard();
        $this->cards = [$playerCard1, $playerCard2];
        $this->lost  = false;
        $this->stand = false;
    }

    /**
     * @param bool $lost
     */
    public function setLost(bool $lost): void
    {
        $this->lost = $lost;
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    public function hit(Deck $deck): array
    {
        $this->cards[] = $deck->drawCard();
        if ($this->getScore() > 21) {
            $this->lost = true;
        }
        return $this->cards;
    }

    public function getScore(): int
    {
        $this->score = 0;
        foreach ($this->cards as $card) {
            $this->score += $card->getValue();
        }
        return $this->score;
    }

    /**
     * @return bool
     */
    public function isStand(): bool
    {
        return $this->stand;
    }

    /**
     * @param bool $stand
     */
    public function setStand(bool $stand): void
    {
        $this->stand = $stand;
    }

    public function surrender(): void
    {
        $this->lost = true;
    }

    public function hasLost(): bool
    {
        return $this->lost;
    }

}