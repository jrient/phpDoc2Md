<?php
/**
 * Created by PhpStorm.
 * User: jianfeng
 * Date: 2018/9/30
 * Time: 16:24
 *
 *  样例：
 *  # 接口文档
 *
 *  ## {class}
 *  
 *  ### info
 *  `author: {author}` `copyright: copyright`
 *  {description}
 *  
 *  ### api
 *
 *  #### {action.name}
 *  
 *  `author: {action.author}` `copyright: {action.copyright}`
 *  `url: {action.url}`
 *  {action.description}
 *  
 *  ##### params
 *  
 *  |  参数  |  类型  |  说明  |
 *  | ------ | ------ | ------|
 *  | {action.param_name} | {action.param_type} | {action.param_title} |
 *  ...
 *  
 *  ##### return
 *
 *  |  参数  |  类型  |  说明  |
 *  | ------ | ------ | ------|
 *  | {action.return_name} | {action.return_type} | {action.return_title} |
 *  ...
 *  
 */

namespace jrient\phpDoc2Md;

/**
 * Class BuildMd
 * @package jrient\phpDoc2Md
 */
class BuildMd extends ApiDoc
{
    /**
     * @var $model
     */
    static private $model;

    private $dir;
    private $class;

    public function __construct($config)
    {
        $this->dir = $config['dir'];
        $this->class = $config['class'];
        parent::__construct(['class'=>$this->class]);
    }

    static public function run($config)
    {
        if (empty(self::$model)) {
            self::$model = new self($config);
        } 
        $model = self::$model;
        return $model->buildDoc($model->getApiDoc());
    }

    private function buildDoc($data)
    {
        $doc = "# 接口文档 \n\n";
        $doc .= "[toc] \n\n";
        $doc .= "--- \n\n";

        foreach ($data as $class => $classInfo) {
            $doc .= "## {$class} \n\n";
            $doc .= "### info \n\n";
            $doc .= (isset($classInfo['author']) ? "`author: {$classInfo['author']}`" : '') . ' ' . (isset($classInfo['copyright']) ?  "`copyright: {$classInfo['copyright']}`" : '') . "\n\n";
            $doc .= (isset($classInfo['description']) ?  "{$classInfo['description']}"."\n\n" : '');
            $doc .= "### api \n\n";

            foreach ($classInfo['action'] as $action => $actionInfo) {
                $doc .= "#### " . (isset($actionInfo['name']) ? $actionInfo['name'] : $action) . "\n\n";
                $doc .= (isset($actionInfo['author']) ? "`author: {$actionInfo['author']}`" : '') . ' ' . (isset($actionInfo['copyright']) ?  "`copyright: {$actionInfo['copyright']}`" : '') . "\n\n";
                $doc .= (isset($actionInfo['method']) ?  "`method: {$actionInfo['method']}`"."\n\n" : '');
                $doc .= (isset($actionInfo['description']) ?  "{$actionInfo['description']}"."\n\n" : '');

                $doc .= "##### params \n\n";
                $doc .= $this->buildTable($actionInfo['param'], 'param') . "\n\n";

                $doc .= "##### return \n\n";
                $doc .= $this->buildTable($actionInfo['return'], 'return') . "\n\n";
            }
        }
        return $doc;
    }

    private function buildTable($params, $prefix)
    {
        $doc = "|  参数  |  类型  |  说明  |\n";
        $doc .= "| ------ | ------ | ------|\n";
        foreach ($params as $value) {
            switch ($prefix) {
                case 'param':
                    $doc .= "| {$value['param_name']} | {$value['param_type']} | {$value['param_title']} |\n";
                    break;
                case 'return':
                    $doc .= "| {$value['return_name']} | {$value['return_type']} | {$value['return_title']} |\n";
                    break;
            }
        }
        return $doc;
    }
}