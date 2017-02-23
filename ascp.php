<?php
/**
 * PHP实现今日头条网站 头条号账号页面列表接口参数ascp算法
 * User: zhou.Y
 * Date: 2/23/2017
 * Time: 10:53 AM
 */
function getAsCp()
{
    $i = time();
    $t = strtoupper(dechex($i));
    $md5String = strtoupper(md5($i));
    if (8 != strlen($t)) {
        return [
            'as' => "479BB4B7254C150",
            'cp' => "7E0AC8874BB0985",
        ];
    }
    $s = substr($md5String, 0, 5);
    $o = substr($md5String, -5, 5);
    $a = $c = '';
    for ($n = 0; $n < 5; $n++) {
        $a .= $s[$n] . $t[$n];
    }
    for ($r = 0; $r < 5; $r++) {
        $c .= $t[$r + 3] . $o[$r];
    }
    return [
        'as' => "A1" . $a . substr($t, -3),
        'cp' => substr($t, 0, 3) . $c . "E1"
    ];
}


print_r(getAsCp());