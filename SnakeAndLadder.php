<?php
//UC1:player starting position is zero.
class SnakeLadder{
    private $startposition = 0;

   public function welcome()
    {
        echo "Welcome to the Snake and Ladder Game";
    }
}

$game = new SnakeLadder();
$game->welcome();