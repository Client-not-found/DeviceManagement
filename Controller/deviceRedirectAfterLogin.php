<?php

function redirectUser() {
    return 'https://nicolas.business-design.ch/wp-admin/edit.php?post_type=dm_device';
}

add_filter('login_redirect', 'redirectUser');