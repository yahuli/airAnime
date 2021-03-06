<?php
//抓取 Calibur 数据并输出 json && https://www.calibur.tv/ && 1360
$rst = array();
for ($i = 1350; $i < 1380; $i++) {
    $f = array();
    $link = 'https://www.calibur.tv/bangumi/' . $i . '/video';
    $data = curl_get_contents($link);
    if (substr_count($data, '没有找到番剧') == 0) {
        $title = getSubstr($data, '<h1 class="title">', '</h1>');
        $url = 'https://www.calibur.tv/bangumi/' . $i;
        $f['title'] = $title;
        $f['link'] = $url;
        array_push($rst, $f);
    }
}
$frst = json_encode($rst, JSON_UNESCAPED_UNICODE);
echo $frst;

function curl_get_contents($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);            //设置访问的url地址   
    //curl_setopt($ch,CURLOPT_HEADER,1);            //是否显示头部信息   
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);           //设置超时   
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Trident/7.0; rv:11.0) like Gecko');   //用户访问代理 User-Agent   
    curl_setopt($ch, CURLOPT_REFERER, 'https://www.calibur.tv/');        //设置 referer   
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);      //跟踪301   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        //返回结果   
    $r = curl_exec($ch);
    curl_close($ch);
    return $r;
}
function getSubstr($str, $leftStr, $rightStr)
{
    $left = strpos($str, $leftStr);
    //echo '左边:'.$left;
    $right = strpos($str, $rightStr, $left);
    //echo '<br>右边:'.$right;
    if ($left < 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right - $left - strlen($leftStr));
}
?>