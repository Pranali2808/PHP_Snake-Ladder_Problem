<?php
/*UC3:Player checks for the option like ladder,snake bite and no play.
Roll the dice to getting random numbers.
*/
class SnakeLadder{
    private $startposition = 0;
    private $previousposition;
   // private $DiceNum;
    private $count = 0;

    public function welcome()
    {
        echo "******Welcome to the Snake and Ladder Game***** \n";
        if($this->previousposition==$this->startposition)
        {
         echo "game started with 0 position\n";
        }
    }

   public function RollDice()
    {
        $this->DiceNum = rand (1,6);//generate random number between  1 to 6.
        $this->count ++;
        echo "Dice rolls : $this->count  times \n";
       return $this->DiceNum;
       }
    public function Options()
    {
        return rand(0,2);
    }

    public function NextMove($Check){
        $Check = $this->Options();
            $this->previousPosition = $this->startposition;
        switch($Check){
            case 0 :
                $this->startposition=$this->startposition;
                echo "NO PLAY \n start position : $this->startposition \n";
                break;
            case 1 :
                $this->startposition=+$this->DiceNum;
                echo "LADDER \n start position : $this->startposition \n";
                break;
            case 2 :
                $this->startposition=-$this->DiceNum;
                echo "SNAKE BITE \n start position : $this->startposition \n";
                break;
             }
             echo "Player current position is : $this->startposition \n";

             
        }
    }

$game = new SnakeLadder();//create object
$game->welcome();//calling the function
$DiceNum = $game->RollDice();
$game->NextMove($DiceNum);
?>