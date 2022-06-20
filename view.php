<?php

include "site_nav.php";
include "system/functions.php";

// extract
extract($_GET);

// database connection
$db = db_con();

?>
<div class="container cat_container">
    <div class="row">
        <?php

        $sql = "SELECT c.cat_id, c.cat_name, c.cat_icon 
        FROM jobs j
        INNER JOIN categories c ON c.cat_id = j.cat_id
        WHERE j.job_status = 1 AND j.job_id = $job_id;";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

        ?>
            <div class="col-5 view_cat">
                <a href="categories.php?cat_id=<?php echo $row['cat_id'] ?>" style="text-decoration: none; color: black;" >
                    <h2 class=" view_link"><i class="<?php echo $row['cat_icon'] ?> cat_icon"></i> <?php echo $row['cat_name'] ?></h2>
                </a>

            </div>

        <?php
        }
        ?>
    </div>

    <?php

    $sql = "SELECT * FROM `jobs` WHERE job_id = $job_id AND job_status = 1;";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>

        <div class="row">
            <div class="col-7">
                <img class="d-block w-100" src="assets/images/<?php echo $row['job_image'] ?>" alt="First slide" style="padding-right: 50px;">
            </div>
            <div class="col-5">
                <h2><?php echo $row['job_title']; ?></h2>
                <hr>
                <p>
                    <?php echo $row['job_description']; ?>
                </p>
                <h5>Requirements</h5>
                <ul>
                    <li>Quantity</li>
                    <li>Year Of Manufacture</li>
                    <li>HDD Capacity</li>
                    <li>Graphics Card</li>
                </ul>
                <hr>
                <form action="proposal.php" method="get">
                    <input type="hidden" name="job_id" value="<?php echo $row['job_id'] ?>">
                    <button type="submit" class="btn general_btn">Submit Proposal</button>
                </form>
            </div>
        </div>

    <?php
    }
    ?>

</div>

<?php

include "site_footer.php"

?>