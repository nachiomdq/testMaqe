# testMaqe
MAQE Homework Challenge - MAQE Bot
MAQE has built a robot called MAQE Bot which walks in 2-dimensional plane (X, Y coordinate). It can only turn left or right, and walk straight. It also knows of its current position (X, Y) as well as its direction (North, East, West and South). In order to command MAQE Bot to walk, it must be input with a walking command. The walking command can be represented with a string consisting of three alphabets R, L and W and a positive integer N to indicate the distance of how many positions it has to walk which can be explained as follows:

For example, the walking code of RW15RW1 means

MAQE Bot starts at 0, 0 facing up North.
MAQE Bot turns right (facing East) and walk straight 15 positions.
MAQE Bot turns another right (now facing South) and walk straight 1 position.

The script accepts a command line argument as an input string of the walking code and print out the result of the last position (X, Y) of MAQE Bot and its last facing direction (North, East, West or South).

Note that the output is case-sensitive.

## Instructions
php artisan command:instructions W55555RW555555W444444W1

php artisan command:instructions RRW11RLLW19RRW12LW1

php artisan command:instructions W5RW5RW2RW1R 
