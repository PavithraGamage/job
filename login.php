<?php

include "site_nav.php";
include "system/functions.php";

?>

<div class="container cat_container login_container">
    <h2>Login</h2>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1" class="pro_labels">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="pro_labels">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style="margin-bottom: 30px;">
        </div>
        <button type="submit" class="btn general_btn">Login</button>
        <small id="emailHelp" class="form-text text-muted" style="float:inline-end">If you don't have account please register</small>
    </form>
    
</div>


<?php

include "site_footer.php";

?>