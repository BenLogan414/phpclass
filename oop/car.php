<?php
namespace oop;

class car
{
    public $color;
    public $make;
    public $model;
    public $year;
    public $status;

    function __construct()
    {
        $this->status = "stop";
    }

    function forward()
    {
        echo "The car is moving forward <br />";
        $this->status = "forward";
    }

    function reverse()
    {
        echo "The car is moving in reverse <br />";
        $this->status = "reverse";
    }

    function stop()
    {
        echo "The car is stopped <br />";
        $this->status = "stop";
    }
}

$myCar = new car();

$myCar->color = 'Red';
$myCar->make = 'Jeep';
$myCar->model = 'Wrangler';
$myCar->year = '2014';

echo "My Car is a " . $myCar->color . " " . $myCar->make . " " . $myCar->model . "<br /><br /><hr /><br />";

//echo $myCar->forward();
echo $myCar->status;