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
        <div class="col-10 cat_list" id="cat_list">

        </div>
    </div>

</div>

<script>  
 $(document).ready(function(){  
    
      load_data();  

      function load_data(page)  
      {  
           $.ajax({  
                url:"needs_list.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#cat_list').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });  
 </script> 


<?php

include "site_footer.php"

?>