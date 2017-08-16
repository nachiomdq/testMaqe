<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class instructions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:instructions {instructions?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Instructions for Directions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $instructions = $this->argument('instructions');
        $argv = $_SERVER['argv'];
        #Init variables
        $currentPosition = [];
        $initialDirection = 0;

        #Check if instructions are valid with regex and save in $instructions[0]
        preg_match_all("/[RL]|W(?!W)[0-9]+/",$argv[2],$instructions);

        #Array of directions
        $directions = ['North', 'East', 'South', 'West'];

        #Initial Position
        $currentPosition = [0,0];

        foreach ($instructions[0] as $v) {
            # code...
            switch (true) {
                case preg_match("/^R$/",$v):
                    preg_match("/^R$/",$v ,$matchs);
                    $initialDirection += 1;
                    if ($initialDirection > count($directions) - 1)
                        $initialDirection = 0;

                    echo "Turn to right\n";
                    echo "Current direction  ".$directions[$initialDirection]."\n";

                    break;
                case preg_match("/^L$/",$v):
                    $initialDirection -= 1;
                    if ($initialDirection < 0)
                        $initialDirection = count($directions) - 1;
                    preg_match("/^L$/",$v ,$matchs);
                    echo "Turn left\n";
                    echo "Current direction  ".$directions[$initialDirection]."\n";
                    break;
                case preg_match("/W(?!W)[0-9]+/",$v):
                    $steps = intval(substr($v,1));
                    echo "\n Bot walking ".$steps."\n";

                    switch ($directions[$initialDirection]) {
                        case 'East':
                            $currentPosition[0] += $steps;
                            break;
                        case 'West':
                            $currentPosition[0] -= $steps;
                            break;
                        case 'North':
                            $currentPosition[1] += $steps;
                            break;
                        case 'South':
                            $currentPosition[1] -= $steps;
                            break;
                        default:
                            break;
                    }
                    break;

                default:

                    break;
            }

            echo "Bot X: ".$currentPosition[0]."  Bot Y: ".$currentPosition[1]." Current Direction: ".$directions[$initialDirection];
        }


    }
}
