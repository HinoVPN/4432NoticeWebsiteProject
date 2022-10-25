<?php
    // delete cookie
    function delete($field){
        if (isset($_COOKIE[$field])) {
            unset($_COOKIE[$field]);
            setcookie($field, '', time() - 3600, '/'); // empty value and old timestamp
        }
    }
    delete('_id');
    delete('profileImageDir');
    delete('nickname');
    delete('userId');
    delete('password');
    delete('type');
    header("location:../pages/signIn.php");
?>