<?php

get_header();

?>

<div class="login-form-container">
    <form action="submit-login" method="post" id="login-form">
        <input type="email" placeholder="Your login" name="email" required> <br />
        <input type="password" placeholder="Your password" name="password" required> <br />
        <button type="submit">Submit</button>
    </form>
</div>


<?php
get_footer();