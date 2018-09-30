<?php
/**
 * Created by PhpStorm.
 * User: jianfeng
 * Date: 2018/9/30
 * Time: 11:33
 * @title title
 * @method post
 * @url http://www.baidu.com
 */


/**
 * Class Test
 *
 * 这是一个测试的类
 * @access public
 * @author jrient
 * @copyright 2018-09-30
 * @deprecated 这是一个测试类的说明
 * @example
 * 这是个实例 ../index.php
 *
 * @link www.baidu.com
 * @name Test
 * @package main
 * @see this_see
 * @since v1.1.1
 * @todo   something need todo
 * @var $c
 * @version v2.2.3
 * @title title
 * @method post
 * @url http://www.baidu.com
 * @code
 * {
 *      ;'asdfasdfasdfasdf
 * }
 * @example
 * {
 *  阿斯顿发斯蒂芬
 * }
 *
 */
class ApiTest
{
    /**
     * 说明 这是一个说明
     * @title   title
     * @method post
     * @url http://www.baidu.com
     * @param string $name 名字
     * @param string $info 信息
     * @return string
     */
    public function index($name, $info)
    {
        return $name;
    }

    /**
     * 说明 这是一个说明
     * @title   title
     * @method post
     * @url http://www.baidu.com
     * @param string $name 名字
     * @param string $info 信息
     * @return string
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