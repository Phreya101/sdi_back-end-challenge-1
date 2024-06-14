<?php
$conn = new mysqli('localhost', 'root', '', 'back_end');

if (!$conn) {
    echo 'connect error' . mysqli_error($conn);
}
