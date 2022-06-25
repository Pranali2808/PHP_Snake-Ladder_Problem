<?php
/*UC7:play the game with 2 players and if the player get ladder then play again
Player checks for the option like ladder,snake bite and no play.
Roll the dice to getting random numbers.
*/
class SnakeLadder{
     
 
     public $positionPlayer1 = 0;
     public $diceRollCountPlayer1 = 0;
     public $positionPlayer2 = 0;
     public $diceRollCountPlayer2 = 0;
     
 
     function welcome()
     {
        echo "******Welcome to the Snake and Ladder Game***** \n";
       
            echo "game started with 0 position \n";
     }
    /**
      * Function to get the option for nextmove
      * Passing startposition as Parameter, Returns startosition
      */
     function NextMove($startposition)
     {
         $DiceNum = $this->RollDice();
         $Check = rand(0, 2);
         echo "Option is : " . $Check . "\n";
         switch ($Check) {
             case 0 :
                echo "NO PLAY \n";
                $startposition = $startposition;
                break;
                 
             case 1 :
                echo "LADDER \n";
                if ($startposition + $DiceNum > 100) {
                    $startposition = $startposition;
                } else {
                    $startposition += $DiceNum;
                }
                echo "startposition before extra dice rolls is : " . $startposition . "\n";
                $startposition = $this->nextMove($startposition);
                break;
                
             case 2 :
                echo "SNAKE BITE \n";
                $startposition -= $DiceNum;
                if ($startposition <= 0) {
                    $startposition = 0;
                }
                break;
                 
         }
         return $startposition;
     }

      // Function to get random number between 1 to 6
      
     function RollDice()
     {
         $DiceNum = rand(1, 6);
         echo "Number on Dice : " . $DiceNum . "\n";
         return $DiceNum;
     }
 
     /**
      * Function to Play the game for player 1
      * Calling the nextmove function and getting player 1 position
      */
     function player1()
     {
         $this->diceRollCountPlayer1++;
         $this->positionPlayer1 = $this->NextMove($this->positionPlayer1);
         echo "Position of Player 1 is : " . $this->positionPlayer1 . "\n";
         if ($this->positionPlayer1 == 100) {
             echo " Player 1 is the Winner \n";
             echo " Total count of Dice Rolled : " . $this->diceRollCountPlayer1 . " \n";
             echo " Position of Player 1 : " . $this->positionPlayer1 . "\n";
             
         }
     }
     
     /**
      * Function to Play the game for player 2
      * Calling the nextmove function and getting player 2 position
      * and printing the position of the player 2
      */
     function player2()
     {
         $this->diceRollCountPlayer2++;
         $this->positionPlayer2 = $this->NextMove($this->positionPlayer2);
         echo "Position of Player 2 is: " . $this->positionPlayer2 . "\n";
         if ($this->positionPlayer2 == 100) {
             
             echo " Player 2 is the Winner \n";
             echo " Total count of Dice Rolled : " . $this->diceRollCountPlayer2 . " \n";
             echo " Position of Player 2 : " . $this->positionPlayer2 . "\n";
             
         }
     }
 
     /**
      * Function to Play the Snake and Ladder Game
      * Calling player functions inside
      * Using While loop to play till one player wins
      */
     function playGame()
     {
         $DicePlay = rand(1, 2);//to decide turn of players
         while ($this->positionPlayer1 < 100 && $this->positionPlayer2 < 100) {
             if ($DicePlay == 1) {
                 $this->player1();
                 if ($this->positionPlayer1 == 100 || $this->positionPlayer2 == 100) {
                     break;
                 } else {
                     $this->player2();
                 }
            } else {
                 $this->player2();
                 if ($this->positionPlayer1 == 100 || $this->positionPlayer2 == 100) {
                     break;
                 } else {
                     $this->player1();
                }
            }
        }
         
         echo " *********** We Have A Winner ************** \n";
         echo "*********** GAME OVER ***************** \n";
        
    }
 }
 
 $game = new SnakeLadder();
 $game->welcome();
 $game->playGame();
    
?>