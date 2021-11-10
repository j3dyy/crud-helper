<?php

namespace J3dyy\CrudHelper\Components\Table;

use Illuminate\View\View;
use J3dyy\CrudHelper\Elements\Button;
use J3dyy\CrudHelper\Elements\Element;
use J3dyy\CrudHelper\Elements\ElementTypes;

class Column extends Element
{

    public function __construct($key, $content, $className = null, $id = null, $label = null)
    {
        parent::__construct(ElementTypes::COLUMN, $key, $content, $className, $id);

        if ($label != null){
            $this->label = $label;
        }
    }

    public function button($content, $classes = null, $id = null, $dataAttrs = [], $link = null){
       $this->content = new Button($this->key,$content,$classes,$id,$dataAttrs,$link);
       return $this;
    }

    function transform(array $entity): View
    {
        $path = 'crudHelper::table.column';
        if ($this->content instanceof Button){
            $path = 'crudHelper::table.buttonColumn';
        }

        return view($path,[
            'column'=>$this,
            'entity'=>$entity
        ]);
    }

    public static function make($key, $content, $className = null, $id = null){
        return new Column($key,$content,$className,$id);
    }
}
