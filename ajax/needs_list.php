<?php

// extract
extract($_GET);

// db connection
$db = db_con();

$record_per_page = 5;
$page = '';
$output = '';

if (isset($_POST["page"])) {
    $page = $_POST["page"];

} else {
    $page = 1;

}

$start_from = ($page - 1)*$record_per_page;

$sql = "SELECT * FROM jobs WHERE job_status = 1 AND cat_id = $cat_id ORDER BY job_created_date ASC LIMIT $start_from, $record_per_page ;";

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