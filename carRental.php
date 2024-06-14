<?php
function whole($number)
{
    return is_numeric($number) && (int)$number == $number;
}

$cars = [
    [
        'Size' => 'S',
        'SeatCapacity' => 5,
        'Cost' => 5000
    ],
    [
        'Size' => 'M',
        'SeatCapacity' => 10,
        'Cost' => 8000
    ],
    [
        'Size' => 'L',
        'SeatCapacity' => 15,
        'Cost' => 12000
    ]
];

$seat = (int)readline('Please input number (seat): ');


$lowestTotal = PHP_INT_MAX;
$lowestCar = null;
$lowestResult = null;

if ($seat > 0) {
    foreach ($cars as $car) {
        $capacity = $car['SeatCapacity'];
        $result = $seat / $capacity;
        $cost = $car['Cost'];
        $total = $cost * $result;

        if (whole($result) && $total < $lowestTotal) {
            $lowestTotal = $total;
            $lowestCar = $car;
            $lowestResult = $result;
        }
    }

    if ($lowestCar !== null) {
        echo $lowestCar['Size'] . " x " . $lowestResult . "\n" . 'Total = PHP ' . $lowestTotal . "\n";
    } else {
        echo "No valid car configuration found.\n";
    }
} else {
    echo "Please enter a valid number of seats.\n";
}
