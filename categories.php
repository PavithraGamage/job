<?php

// includes
include "site_nav.php";
include "system/functions.php";

// extract variables
extract($_GET);

// db connection
$db = db_con();


?>
<div class="container cat_container">
    <div class="row">
        <?php

        $sql = "SELECT * FROM `categories` WHERE cat_id = $cat_id";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

        ?>
            <div class="col-5">
                <h2><i class="<?php echo $row['cat_icon'] ?> cat_icon"></i> <?php echo $row['cat_name'] ?></h2>
            </div>
        <?php

        }

        ?>

        <div class="col-7">
            <div class="input-group mb-3">
                <input type="text" class="form-control cat_search" placeholder="Search Items" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn cat_search_btn" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2 cat_filter">
            <h5>Filter By</h5>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Laptops
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Mobile Phones
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Computer Parts
                </label>
            </div>
        </div>
        <!-- cards -->
        <div class="col-10 cat_list" id="cat_list">
            <?php
            $sql = "SELECT * FROM jobs WHERE job_status = 1 AND cat_id = $cat_id ORDER BY job_created_date";

            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

            ?>
                    <div class="card mb-3 cat_card" style="max-width: 100%;">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img src="assets/images/<?php echo $row['job_image'] ?>" class="img-fluid rounded-start cat_card_image" alt="...">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo ucfirst($row['job_title'])  ?></h5>
                                    <p class="card-text"><?php echo limit_text($row['job_description'], 30)    ?></p>
                                    <p class="card-text"><small class="text-muted"><b>End Date: <?php echo $row['job_end_date'] ?></b></small></p>
                                    <p class="card-text"><small class="text-muted">Colombo, Laptops, End Date <?php echo $row['job_end_date'] ?></small></p>
                                    <form action="view.php" method="get">
                                        <input type="hidden" name="job_id" value="<?php echo $row['job_id'] ?>">
                                        <button type="submit" class="btn general_btn">Success</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<h2 style='color:red'>Currently Category Is Empty 🥲</h2>";
            }
            ?>
            <!-- pagination -->
            <div class="row">
                <div class="col pag">
                    <nav aria-label="...">
                        <ul class="pagination pagination-md">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#" style="color: #159777;">2</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="color: #159777;">3</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>

<?php

include "site_footer.php"

?>