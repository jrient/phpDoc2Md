<?php
/**
 * Created by PhpStorm.
 * User: jianfeng
 * Date: 2018/9/30
 * Time: 16:24
 */

namespace jrient\phpDocMd;

/**
 * Class BuildMd
 * @package jrient\phpDocMd
 */
class BuildMd extends Api
{
    /**
     * @var $model
     */
    static private $model;

    private $path;
    private $class;

    public function __construct($config)
    {
        $this->path = $config['path'];
        $this->class = $config['class'];
    }

    static public function run($config)
    {
        if (empty(self::$model)) {
            self::$model = new self($config);
        }
        $model = self::$model;

        if (!empty($model->class)) {
            foreach ($model->class as $item) {

            }
        }
    }
}