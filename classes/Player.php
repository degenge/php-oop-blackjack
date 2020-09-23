<?php
declare(strict_types=1);

class Player
{
    public const ACTION_HIT = 'hit';
    public const ACTION_STAND = 'stand';
    public const ACTION_SURRENDER = 'surrender';
    public const ACTION_NEW = 'new';

    private array $cards;
    private bool $lost = false;
    private int $score = 0;

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

    public function hit(Deck $deck): Player
    {
        //TODO: return this
        $this->cards[] = $deck->drawCard();
        return $this;
    }

    public function surrender(): void
    {

    }

    public function getScore(): int
    {
//        print_r($this->cards);
//        die;
        foreach ($this->cards as $card) {
            $this->score += $card->getValue();
        }
        return $this->score;
    }

    public function hasLost(): bool
    {
        return $this->score > 21;
    }

}