<?php
    include("../connection/connection.php");

    if(isset($_GET['name'])) {
        // Sanitize the input to prevent SQL injection
        $name = mysqli_real_escape_string($db, $_GET['name']);

        $query = "SELECT * FROM product WHERE title LIKE '$name'";

        // Perform the query
        $result = mysqli_query($db, $query);

        if ($result) {
            $products = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }

            echo json_encode($products);
        } else {
            echo json_encode(array('error' => 'Failed to fetch products'));
        }
    } else {
        echo json_encode(array('error' => 'CategoryId parameter is missing'));
    }
?>