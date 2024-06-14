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
$lowestCars = [];

if ($seat > 0) {
    foreach ($cars as $car) {
        $capacity = $car['SeatCapacity'];
        $result = $seat / $capacity;
        $cost = $car['Cost'];
        $total = $cost * $result;


        if (whole($result)) {

            if ($total < $lowestTotal) {
                $lowestTotal = $total;
                $lowestCars = [[
                    'Size' => $car['Size'],
                    'Result' => $result,
                    'Total' => $total
                ]];
            } elseif ($total == $lowestTotal) {
                $lowestCars[] = [
                    'Size' => $car['Size'],
                    'Result' => $result,
                    'Total' => $total
                ];
            }
        }
    }

    if (!empty($lowestCars)) {
        foreach ($lowestCars as $lowestCar) {
            echo $lowestCar['Size'] . " x " . $lowestCar['Result'] . "\n" . 'Total = PHP ' . $lowestCar['Total'] . "\n";
        }
    } else {
        echo "No valid car configuration found.\n";
    }
} else {
    echo "Please enter a valid number of seats.\n";
}
