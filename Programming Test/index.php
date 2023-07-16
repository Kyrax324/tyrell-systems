<?php

$numberOfPlayer = 10;
main($numberOfPlayer);

$numberOfPlayer = 52;
main($numberOfPlayer);

$numberOfPlayer = 60;
main($numberOfPlayer);

$numberOfPlayer = "Lorem";
main($numberOfPlayer);

$numberOfPlayer = -10;
main($numberOfPlayer);

function main($numberOfPlayer)
{
	// validation
	if (!is_numeric($numberOfPlayer) || $numberOfPlayer < 0) {
		echo "Input value does not exist or value is invalid\n";
		return;
	}

	$cardCollection = new CardCollection();
	$cardCollection->shuffle();
	$cardCollection = $cardCollection->toArray();

	$playerCardCollection = assignCardCollection($cardCollection, $numberOfPlayer);

	// display
	foreach ($playerCardCollection as $playerCardList) {
		echo join(",", $playerCardList) . "\n";
	}
	echo "\n";
}

function assignCardCollection(array $cardCollection, int $numberOfPlayer): array
{
	$playerCards = [];
	$playerId = 0;
	$emptyCardValue = "-";

	foreach ($cardCollection as $key => $card) {
		$playerId++;
		if ($playerId > $numberOfPlayer) {
			$playerId = 1;
		}
		$playerCards[$playerId][] = $card;
	}
	$numberOfCards = count($cardCollection);
	if ($numberOfPlayer > $numberOfCards) {
		$exceededNum = $numberOfPlayer - $numberOfCards;

		for ($i = 0; $i < $exceededNum; $i++) {
			$playerId++;
			$playerCards[$playerId][] = $emptyCardValue;
		}
	}

	return $playerCards;
}

class CardCollection
{
	public $cardCollection = [];

	public function __construct()
	{
		$this->cardCollection = $this->getCardCollection();
	}

	public function getCardCollection(): array
	{
		$shapes = ['S', 'H', 'D', 'C'];
		$cardSeqValues = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

		$cardCollection = [];
		foreach ($shapes as $shape) {
			foreach ($cardSeqValues as $cardSeqValue) {
				$cardCollection[] = "$shape-$cardSeqValue";
			}
		}

		return $cardCollection;
	}

	public function shuffle(): self
	{
		shuffle($this->cardCollection);

		return $this;
	}

	public function toArray(): array
	{
		return $this->cardCollection;
	}
}
