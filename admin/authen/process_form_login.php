<?php

$fullname = $email = $msg = '';

if (!empty(($_POST))) {
    $email = getPost('email');
    $pwd = getPost('password');
    $pwd = getSecurityMD5($pwd);


    $userExist = excuteResult("select * from User where email = '$email' and password = '$pwd' and selected = 1", true);
    if ($userExist == null) {
        // login fail
        $msg = 'Đăng nhập không thành công, vui lòng kiểm tra lại thông tin';
    } else {
        //login success
        $token = getSecurityMD5($userExist['email'].time());
        setcookie('token', $token , time() + 7 * 24 * 60 * 60, '/');
        $created_at = date('Y-m-d H:i:s');

        $_SESSION['user'] = $userExist;

        $userId = $userExist['id'];
        $sql = "insert into Tokens (user_id, token, created_at ) value 
                ('$userId', '$token', '$created_at')";
        excute($sql);


        header('Location: ../');
        die();
    }
}