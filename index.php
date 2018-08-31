<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 2018/6/14
 * Time: 9:10
 */
$private_key='-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQDAbfx4VggVVpcfCjzQ+nEiJ2DLnRg3e2QdDf/m/qMvtqXi4xhw
vbpHfaX46CzQznU8l9NJtF28pTSZSKnE/791MJfVnucVcJcxRAEcpPprb8X3hfdx
KEEYjOPAuVseewmO5cM+x7zi9FWbZ89uOp5sxjMnlVjDaIczKTRx+7vn2wIDAQAB
AoGAZzUWajxKTZeJqh5FjBgmwZi5M7voFynZAjRWAkCkqZye0FfY7e70kA92C1AL
aVqySnNr4WYZuGorEeOFGqHIv1XSowTLgfLkVBZ/SXiep2QYJrR0YevjysvLnTfb
mrdWCqWSj+0AlQg+AvDA/qtvBVMxKymbpo+4bj5H2pPPZ1ECQQDi1PwJQJBYPbpL
vGmP3AmWg467tCeQ+aJGgtQTOK5BH+p0BWFVDX583R437vllkKI8EXgZfqQfsQcj
7XUAXyZVAkEA2SyFbO8roH9JLrEoxxKGeiGZvhPfNl9nXLhX0OFS0ywQaVBJno39
9W5bX5iP5Jzeb3UWsZ/TxzhGc/b4WjAlbwJBAOFuIn1feRT5Y+hY++BJIg4/+N57
EMd4ENpas0HXFvcKLQvZPP42Rvr5FksoaRuTPmjMQ7uyrJICccI3AAy6g3ECQQDE
AyH9+zRmLNxRj0advsOvUcpgu7DYc21oS12/Qs+tl3TMiNGZkNDphwxjkOA217sP
4B92fCn6AnncSslHJXNzAkBo6ujxqIfrZMOG3ON9nXxkWlq39GFS6CzXWscHA3Xz
FMVT1WWU3FR2Kf2QSKiMGv02YcI2xfowim3JnT6600N0
-----END RSA PRIVATE KEY-----';

//从前端拿到的RSA加密数据
$es='rAIsNx4P/PGEHOjB422BR8L8svZwcMSk6YKwpDnJGpgvo0b/abs+VrEyRfGfHujJAvpi/oCMZz4rTNVoZaDUXSiS4nl+TZOKxX+c0qpCLp1yzrVOXWTbZEfnmNkKQ6yJKDPR32faKVzDU0VSgxgIluTxIYUVmkYXqY3V0R7352U=';
//私钥解密
openssl_private_decrypt(base64_decode($es),$decrypted,$private_key);
echo $decrypted;
$encrypt_exist=false;
if(!empty($decrypted)) {
    $arr = json_decode($decrypted, true);
    if(array_key_exists("encrypt",$arr)) {
        if($arr['encrypt']=="yes") $encrypt_exist=true;
    }
}
if(!$encrypt_exist) die("抱歉！数据提交错误！");
//继续后续处理
dump($arr);