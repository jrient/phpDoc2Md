
这是一个简单的接口md文档生成器。

参照phpdoc的文档书写格式，做了一定的修改。只读取一些必要的参数。

以 `*` 开头的无标记行内容，汇总到description

class:`@author` `@copyright`

action: `@name` `@author` `@copyright` `@url` `@param` `@return` 

生成格式如下：

```
 # 接口文档
 
 ## {class}
 
 ### info
 `author: {author}` `copyright: copyright`
 {description}
 
 ### api
 
 #### {action.name}
 
 `author: {action.author}` `copyright: {action.copyright}`
 `url: {action.url}`
 {action.description}
 
 ##### params
 
 |  参数  |  类型  |  说明  |
 | ------ | ------ | ------|
 | {action.param_name} | {action.param_type} | {action.param_title} |
 ...
 
 ##### return
 
 |  参数  |  类型  |  说明  |
 | ------ | ------ | ------|
 | {action.return_name} | {action.return_type} | {action.return_title} |
 ...
```
