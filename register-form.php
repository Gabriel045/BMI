<?php
/*
Custom User Registration Template
*/

if (is_user_logged_in()) {

    echo '<p> You are already register. <a href="' . esc_url(wp_logout_url()) . '">Sign out</a></p>';
} else {
    // Validate and register user
    if (isset($_POST['register'])) {
        $email = sanitize_email($_POST['email']);
        $password = wp_hash_password($_POST['password']);

        if (empty($email) || empty($password)) {
            echo '<p class="error">Please complete all fields.</p>';
        } elseif (!is_email($email)) {
            echo '<p class="error">The email address is not valid.</p>';
        } elseif (username_exists($email)) {
            echo '<p class="error">Username already exist.</p>';
        } elseif (email_exists($email)) {
            echo '<p class="error">The email address is already registered.</p>';
        } else {
            $user_id = wp_create_user($email, $password, $email);
            if ($user_id) {
                wp_set_auth_cookie($user_id);
                wp_redirect(home_url());
                exit;
            } else {
                echo '<p class="error">An error occurred while registering the user.</p>';
            }
        }
    }

    // Render the Form 
?>
    <h2 class="text-[48px]">Register</h2>
    <form method="post" class="mt-[50px]">
        <p class=" flex flex-col">
            <label class="text-[14px] text-dark-blue font-[500]" for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" class="required text-[16px] text-[#667085] border-[1px] border-[#D0D5DD] rounded-[8px] mt-[6px] py-[4px] px-[14px]">
        </p>

        <p class=" flex flex-col mt-[24px]">
            <label class="text-[14px] text-dark-blue font-[500]" for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" class="required text-[16px] text-[#667085] border-[1px] border-[#D0D5DD] rounded-[8px] mt-[6px] py-[4px] px-[14px]">
        </p>

        <button type="submit" name="register" class="btn-blue mt-[50px] w-full" style="border-radius:8px;">Register</button>
    </form>
<?php
}
?>