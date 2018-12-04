<?php
/*
 *
 *
 *
 * 返回访问者ip
 */

//获取游客访问ip的模块
function getip(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $cip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $cip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }elseif(!empty($_SERVER['REMOTE_ADDR'])){
        $cip = $_SERVER['REMOTE_ADDR'];
    }else{
        $cip = '';
    }
    return $cip;
}