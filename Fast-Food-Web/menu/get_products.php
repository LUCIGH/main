<?php
    include("../connection/connection.php");

    if(isset($_GET['categoryId'])) {
        // Sanitize the input to prevent SQL injection
        $categoryId = mysqli_real_escape_string($db, $_GET['categoryId']);

        $query = "SELECT * FROM product WHERE category_id = '$categoryId'";

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