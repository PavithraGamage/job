<?php

// includes
include "site_nav.php";
extract($_GET);


?>
<div class="container cat_container">
    <div class="row">
        <div class="col-3">
            <h2><i class="fa-solid fa-laptop cat_icon"></i> Electronics</h2>
        </div>
        <div class="col-9">
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
        <div class="col-10 cat_list">
            <div class="card mb-3 cat_card" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="assets/images/laptop_1.jpg" class="img-fluid rounded-start cat_card_image" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Colombo, Laptops</small></p>
                            <form action="view.php" method="get">
                                <button type="submit" class="btn general_btn">Success</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card mb-3 cat_card" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="assets/images/laptop_2.jpg" class="img-fluid rounded-start cat_card_image" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Colombo, Mobile Phones</small></p>
                            <button type="button" class="btn general_btn">Success</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card mb-3 cat_card" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="assets/images/laptop_3.jpg" class="img-fluid rounded-start cat_card_image" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Colombo, Computer Parts</small></p>
                            <button type="button" class="btn general_btn">Success</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>



<?php

include "site_footer.php"

?>