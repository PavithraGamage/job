<?php

include "site_nav.php";
include "system/functions.php";

// extract
extract($_GET);

// db connection
$db = db_con();

?>

<div class="container cat_container">
    <?php

    $sql = "SELECT job_title FROM `jobs` WHERE job_id = $job_id;";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

    ?>
        <h2 class="pro_title">Submit a proposal for <b><?php echo $row['job_title'] ?></b></h2>
    <?php

    }
    ?>

    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <h4 class="pro_personal_details">Personal Details</h4>
        <div class="row">
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">First Name</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">Last Name</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">Contact Number</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">Address Line 1</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">Address Line 2</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">City</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">Postal Code</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputState" class="pro_labels">Province</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                    </select>
                </div>
            </div>
        </div>

        <h4 class="pro_personal_details">Proposal Details</h4>
        <div class="col-12 pro_inputs">
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="pro_labels">Cover Letter</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
            </div>
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" id="formFile">
        </div>
        <button type="submit" class="btn general_btn" style="margin-top: 25px;">Submit Proposal</button>
    </form>
</div>


<?php

include "site_footer.php"

?>