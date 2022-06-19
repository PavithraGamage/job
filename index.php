<?php

// includes
include "site_nav.php";
include "system/functions.php";

// db connection
$db = db_con();

?>

<div class="container-fluid search">
    <div class="container search_bar">
        <form action="search.php" method ="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control search_field" placeholder="Search Items" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn search_btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <h5 class="cat_title">Browse items by category</h5>
    <div class="row">
        <!-- cat box start -->
        <?php

        $sql = "SELECT * FROM `categories` WHERE cat_status = 1;";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="col-3 cat_box">
                    <form action="categories.php" method="get" id="cat_form<?php echo $row['cat_id'] ?>" style="cursor:pointer">
                        <a onclick="submit_cat<?php echo $row['cat_id'] ?>();">
                            <div class="row">
                                <div class="col-2">
                                    <div class="cat_icon">
                                        <i class="<?php echo $row['cat_icon'] ?>"></i>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <h6 class="cat_name"><?php echo $row['cat_name'] ?></h6>
                                    <div>158,458 Ads</div>
                                </div>
                            </div>
                            <input type="hidden" name="cat_id" value="<?php echo $row['cat_id'] ?>">
                        </a>
                    </form>
                    <script>
                        function submit_cat<?php echo $row['cat_id'] ?>() {
                            document.getElementById("cat_form<?php echo $row['cat_id'] ?>").submit();
                        }
                    </script>
                </div>
        <?php
            }
        }

        ?>
    </div>
</div>

<?php

include "site_footer.php";

?>