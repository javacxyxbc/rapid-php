<?php
namespace rapidPHP\library;

class Verify
{
    private static $instance;

    public static function getInstance(){
        return self::$instance instanceof self ? self::$instance : self::$instance = new self();
    }

    /**
     * 是否正则表达式
     * @param $pattern
     * @return int
     */
    public function preg($pattern)
    {
        return (substr($pattern, 0, 1)) == '/' && preg_match("/\/(.*)\//i", $pattern);
    }

    /**
     * 验证邮箱
     * @param $email
     * @return int
     */
    public function email($email)
    {
        return preg_match("/^[0-9a-zA-Z]+(?:[_-][a-z0-9-]+)*@[a-zA-Z0-9]+(?:[-.][a-zA-Z0-9]+)*.[a-zA-Z]+$/i", $email);
    }

    /**
     * 验证电话
     * @param $tel
     * @return int
     */
    public function tel($tel)
    {
        return preg_match("/^[1][34587][0-9]{9}$/i", $tel);
    }

    /**
     * 验证ip地址
     * @param $ip
     * @return int
     */
    public function ip($ip)
    {
        return preg_match('/^[\d.]*$/is', $ip);
    }

    /**
     * 验证url
     * @param $url
     * @return int
     */
    public function website($url)
    {
        return preg_match('/^http[s]?:\/\/'.
                '(([0-9]{1,3}\.){3}[0-9]{1,3}'. // IP形式的URL- 199.194.52.184
                '|'. // 允许IP和DOMAIN（域名）
                '([0-9a-z_!~*\'()-]+\.)*'. // 三级域验证- www.
                '([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\.'. // 二级域验证
                '[a-z]{2,6})'.  // 顶级域验证.com or .museum
                '(:[0-9]{1,4})?'.  // 端口- :80
                '((\/\?)|'.  // 如果含有文件对文件部分进行校验
                '(\/.*)?)$/u', $url) == 1;
    }
}