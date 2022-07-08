<?php

include "site_nav.php";
include "system/functions.php";

// extract
extract($_GET);
extract($_POST);

// db connection
$db = db_con();

// messages array
$messages = array();

// redirect
if (empty($job_id)) {
    header('Location: http://localhost/job/index.php');
}

// insert job
if ($_SERVER['REQUEST_METHOD'] == 'POST' && @$action == 'submit') {

    // clean input data
    data_clean($first_name);
    data_clean($last_name);
    data_clean($contact_number);
    data_clean($email);
    data_clean($addr_line_1);
    data_clean($addr_line_2);
    data_clean($city);
    data_clean($postal_code);
    data_clean($province);
    data_clean($cover_letter);
    data_clean($job_id);

    // basic validation (check empty)
    if (empty($first_name)) {
        $messages['first_name'] = "First name should not be empty";
    }

    if (empty($last_name)) {
        $messages['last_name'] = "Last name should not be empty";
    }

    if (empty($contact_number)) {
        $messages['contact_number'] = "Contact number should not be empty";
    }

    if (empty($email)) {
        $messages['email'] = "Email should not be empty";
    }

    if (empty($addr_line_1)) {
        $messages['addr_line_1'] = "Address line 1 should not be empty";
    }

    if (empty($city)) {
        $messages['city'] = "City should not be empty";
    }

    if (empty($postal_code)) {
        $messages['postal_code'] = "Postal code should not be empty";
    }

    if (empty($province)) {
        $messages['province'] = "Province should not be empty";
    }

    if (empty($cover_letter)) {
        $messages['cover_letter'] = "Cover Letter should not be empty";
    }

    // advance validations
    if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
        $messages['first_name'] = "Only Letters allowed";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
        $messages['last_name'] = "Only Letters allowed";
    }

    if (!preg_match("/^[0-9]*$/", $contact_number)) {
        $messages['contact_number'] = "Phone number not valid";
    }

    if (!empty($email)) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $messages['email'] = "Email is not valid";
        }

        // else {

        //     $sql_e = "SELECT * FROM users WHERE email = '$email'";
        //     $result_e = $db->query($sql_e);
        //     if ($result_e->num_rows > 0) {
        //         $error['email'] = "Email Already Exists";
        //     }
        // }
    }

    if (!preg_match("/^[0-9]*$/", $postal_code)) {
        $messages['postal_code'] = "Postal code not valid";
    }

    if (!preg_match("/^[0-9]*$/", $province)) {
        $messages['province'] = "Province not valid";
    }

    // insert data to db

    if (empty($messages)) {

        // sb query
        $sql = "";

        // run query
        $db->query($sql);

        // success message
        $messages['success'] = "Proposal submit";

        // form clean
        $first_name = null;
        $last_name = null;
        $contact_number = null;
        $email = null;
        $addr_line_1 = null;
        $addr_line_2 = null;
        $city = null;
        $postal_code = null;
        $province = null;
        $cover_letter = null;
    }

    var_dump($_POST);
}

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
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="first_name" value="<?php echo @$first_name ?>">
                    <div style="margin-top: 5px; color: red; font-weight:700"><?php echo @$messages['first_name'] ?></div>
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">Last Name</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="last_name" value="<?php echo @$last_name ?>">
                    <div style="margin-top: 5px; color: red; font-weight:700"><?php echo @$messages['last_name'] ?></div>
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">Contact Number</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="contact_number" value="<?php echo @$contact_number ?>">
                    <div style="margin-top: 5px; color: red; font-weight:700"><?php echo @$messages['contact_number'] ?></div>
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">Email</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="<?php echo @$email ?>">
                    <div style="margin-top: 5px; color: red; font-weight:700"><?php echo @$messages['email'] ?></div>
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">Address Line 1</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="addr_line_1" value="<?php echo @$addr_line_1 ?>">
                    <div style="margin-top: 5px; color: red; font-weight:700"><?php echo @$messages['addr_line_1'] ?></div>
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">Address Line 2</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="addr_line_2" value="<?php echo @$addr_line_2 ?>">
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">City</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="city" value="<?php echo @$city ?>">
                    <div style="margin-top: 5px; color: red; font-weight:700"><?php echo @$messages['city'] ?></div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="inputEmail4" class="pro_labels">Postal Code</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="postal_code" value="<?php echo @$postal_code ?>">
                    <div style="margin-top: 5px; color: red; font-weight:700"><?php echo @$messages['postal_code'] ?></div>
                </div>
            </div>
            <div class="col-4 pro_inputs">
                <div class="form-group">
                    <label for="inputState" class="pro_labels">Province</label>
                    <select id="inputState" class="form-control" name="province" value="<?php echo @$province ?>">
                        <option value="">Choose...</option>
                        <option value="1">Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                        <option>Western</option>
                    </select>
                    <div style="margin-top: 5px; color: red; font-weight:700"><?php echo @$messages['province'] ?></div>
                </div>
            </div>
        </div>
        <h4 class="pro_personal_details">Proposal Details</h4>
        <div class="col-12 pro_inputs">
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="pro_labels">Cover Letter</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Describe about you or your business" name="cover_letter" value="<?php echo @$cover_letter ?>"></textarea>
                <div style="margin-top: 5px; color: red; font-weight:700"><?php echo @$messages['cover_letter'] ?></div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="pro_labels">Attachment</label>
            <input class="form-control" type="file" id="formFile" name="attachment">
            <div style="margin-top: 5px; color: red; font-weight:700"><?php echo @$messages['attachment'] ?></div>
        </div>
        <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
        <button type="submit" class="btn general_btn" style="margin-top: 25px;" name="action" value="submit">Submit Proposal</button>
    </form>
</div>


<?php

include "site_footer.php"

?>