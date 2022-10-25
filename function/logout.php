<?php
    // delete cookie
    function delete($field){
        if (isset($_COOKIE[$field])) {
            unset($_COOKIE[$field]);
            setcookie($field, '', time() - 3600, '/'); // empty value and old timestamp
        }
    }
    delete('_id');
    delete('userId');
    delete('nickname');
    delete('email');
    delete('password');
    delete('profileImageDir');
    delete('birthday');
    delete('type');
    header("location:../pages/signIn.php");
?>