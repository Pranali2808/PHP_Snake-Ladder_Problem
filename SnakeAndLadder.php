<?php
/*UC2:starting position is zero.
Roll the dice to getting random numbers
*/
class SnakeLadder{
    private $startposition = 0;
    private $previousposition;
    private $count = 0;

    public function welcome()
    {
        echo "Welcome to the Snake and Ladder Game \n";
    }

   public function RollDice()
    {
        if($this->previousposition==$this->startposition)
        {
         echo "game started \n";
         //break;
     }
        $DiceNum = rand (1,6);//generate random number between  1 to 6.
        $this->count ++ ;
        echo "The Dice number is : $DiceNum \n ";
        echo "You rolled dice $this->count times \n";
       
       $this->startposition =$this->startposition + $DiceNum ;
       echo "New position is : $this->startposition \n";
       

    }
}

$game = new SnakeLadder();//create object
$game->welcome();//calling the function
$game->RollDice();


?>