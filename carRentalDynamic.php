<?php
include('conn.php');

echo "Options:\n";
echo "1. Rent a Car\n";
echo "2. Update Cars\n";


$choose = (int)readline("Enter your choice: ");

if ($choose == 1) {
    function whole($number)
    {
        return is_numeric($number) && (int)$number == $number;
    }

    $sql = mysqli_query($conn, 'SELECT * FROM `cars`');

    $seat = (int)readline('Please input number (seat): ');


    $lowestTotal = PHP_INT_MAX;
    $lowestCar = null;
    $lowestResult = null;

    if ($seat > 0) {

        while ($car = $sql->fetch_assoc()) {
            $capacity = $car['capacity'];
            $result = $seat / $capacity;
            $cost = $car['cost'];
            $total = $cost * $result;

            if (whole($result) && $total < $lowestTotal) {
                $lowestTotal = $total;
                $lowestCar = $car;
                $lowestResult = $result;
            }
        }

        if ($lowestCar !== null) {
            echo $lowestCar['size'] . " x " . $lowestResult . "\n" . 'Total = PHP ' . $lowestTotal . "\n";
        } else {
            echo "No valid car configuration found.\n";
        }
    } else {
        echo "Please enter a valid number of seats.\n";
    }
} elseif ($choose == 2) {
    $sql = mysqli_query($conn, 'SELECT * FROM `cars`');
    echo "Update:\n";
    echo "1. Capacity\n";
    echo "2. Price\n";
    $select = (int)readline('Enter your choice: ');

    if ($select == 1) {
        echo "Select Car:";
        while ($row = $sql->fetch_assoc()) {
            echo "\n" . $row['id'] . '. ' . $row['size'];
        }
        echo "\n";
        $update = (int) readline("Enter your choice: ");

        if (isset($update)) {
            $up = (int) readline("Enter your capacity value:");
        }

        if (isset($up)) {
            $update = mysqli_query($conn, "UPDATE `cars` SET `capacity`='" . $up . "' WHERE id =" . $update);

            if ($update) {
                echo "Updated";
            }
        }
    }

    if ($select == 2) {
        echo "Select Car:";
        while ($row = $sql->fetch_assoc()) {
            echo "\n" . $row['id'] . '. ' . $row['size'];
        }
        echo "\n";
        $update = (int) readline("Enter your choice: ");

        if (isset($update)) {
            $up = (int) readline("Enter your price value:");
        }

        if (isset($up)) {
            $update = mysqli_query($conn, "UPDATE `cars` SET `cost`='" . $up . "' WHERE id =" . $update);

            if ($update) {
                echo "Updated";
            }
        }
    }
} else {
    echo "Please enter a valid number\n";
}
