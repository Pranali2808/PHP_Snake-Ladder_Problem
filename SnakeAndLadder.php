<?php
/*UC4:repeat till the player reaches winning position 100
Player checks for the option like ladder,snake bite and no play.
Roll the dice to getting random numbers.
*/
class SnakeLadder{
        public $startPosition = 0;
        private $previousPosition;
        private $DiceNum;
        private $count = 0;

        public function welcome(){//
            echo "******Welcome to the Snake and Ladder Game***** \n";
       
            echo "game started with $this->startposition \n";//display starting position
        }

         public function RollDice(){//
            $this->DiceNum = rand(1, 6);//generate random number between 1 to 6
            $this->count++;//increment rolldice count
            echo "Dice rolls : $this->count  times \n";
            return $this->DiceNum;
        }
        public function Options(){
            return rand(0, 2); //Function to generate random number between 1 to 3
        }
        public function NextMove($Check){ //player lookinf for next move
                $this->previousPosition = $this->startPosition;
                switch($Check){
                    case 0:
                        echo "NO PLAY \n";
                        $this->startPosition = $this->startPosition;
                        echo "Previous Position :  $this->previousPosition & StartPosition : $this->startPosition \n";
                        break;
    
                    case 1:
                        echo "LADDER \n";
                        $this->startPosition += $this->DiceNum;
                        if($this->startPosition < 100){
                            echo "Previous Position : $this->previousPosition & StartPosition :  $this->startPosition \n";
                        }
                        elseif($this->startPosition > 100){
                            $this->startPosition = $this->previousPosition;
                            echo "Previous Position : $this->previousPosition  & StartPosition : $this->startPosition \n";
                        }
                        elseif($this->startPosition == 100){
                            echo "Previous Position : $this->previousPosition & StartPosition : $this->startPosition \n";
                            echo "Player won the game....\n *****GAME OVER*****";
                        }
                        break;
    
                    case 2:
                        echo "SNAKE BITE \n";
                        $this->startPosition -= $this->DiceNum;
                        if($this->startPosition < 0){
                            $this->startPosition = 0;
                        }
                        echo "Previous Position : $this->previousPosition & StartPosition : $this->startPosition \n";
                        break;
                }
            } 
       }
       
 
 $game = new SnakeLadder();//create object
 $game->welcome();//calling function
 while($game->startPosition < 100){
 $game->RollDice();
 $Check = $game->Options();
 $game->NextMove($Check);
 }  
 ?>