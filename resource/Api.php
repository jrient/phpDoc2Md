<?php
/**
 * Created by PhpStorm.
 * User: jianfeng
 * Date: 2018/9/30
 * Time: 11:33
 */


/**
 * Class Api
 * 这是一个测试的类
 *
 * @access public
 * @author jrient
 * @copyright 2018-09-30
 * @todo   something need todo
 * @version v2.2.3
 *
 */
class Api
{
    /**
     * 这是接口1，index ，他的主要作用是用来index
     * @name 接口1
     * @method post
     * @url http://www.baidu.com
     * @param string $name 名字
     * @param string $info 信息
     * @return array
     */
    public function index($name, $info)
    {
        return $name;
    }

    /**
     * 这是接口2
     * @name 接口2
     * @method get
     * @url http://www.baidu.com
     * @param string $name 名字
     * @param string $info 信息
     * @return string return 返回字符串信息
     */
    public function index2($name, $info)
    {
        return $name;
    }

    public function myEcho($a)
    {
        echo 11111;
        return $a;
    }
}