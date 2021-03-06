<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class GiovanniniPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class GiovanniniPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

	$choice1 = parent::scissorsChoice();
	$choice2 = parent::rockChoice();
	$choice3 = parent::paperChoice();

	$stats = $this->result->getStatsFor($this->opponentSide);
 	$n = $this->result->getNbRound();
	if ($n == 0)
		return $choice1;
	else if ($stats['rock'] / $n >= 0.4 && $stats['scissors'] <= 0.2)
		return $choice3;
	else if ($stats['paper'] / $n >= 0.4 && $stats['rock'] <= 0.2)
		return $choice1;
	else if ($stats['scissors'] / $n >= 0.4 && $stats['paper'] <= 0.2)
		return $choice2;
	else if ($stats['scissors'] / $n >= 0.33)
		return $choice2;
	else if ($stats['rock'] / $n >= 0.33)
		return $choice3;
	else if ($stats['paper'] / $n >= 0.34)
		return $choice1;
    }
};
