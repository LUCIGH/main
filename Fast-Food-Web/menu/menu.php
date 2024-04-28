<link rel="stylesheet" href="./css/menu.css" />

<div class="category">
    <div class="container">
        <div class = "row" id = "category-list">
            <?php 
                $cate = mysqli_query($db, "select * from category");
                while ($rows = mysqli_fetch_array($cate)) {
                    echo '<div class="col-sm-1 col-md-1 col-lg-1 category-name" data-category-id="' . $rows['id'] . '">'
                            . $rows['name'] .
                        '</div>';
                }
            ?>
        </div>
    </div>

    <div class="container">
        <div class = "row" id = product-list>

        </div>
    </div>
</div>


<script src="js/menu.js"></script>



