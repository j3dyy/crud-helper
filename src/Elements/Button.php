<?php

namespace J3dyy\CrudHelper\Elements;

use Illuminate\View\View;

class Button extends Element
{
    public $link = null;

    public function __construct($key, $content, $classes = null, $id = null, array $dataAttrs = [], string $link = null)
    {
        parent::__construct(ElementTypes::BUTTON, $key, $content, $classes, $id, $dataAttrs);
        $this->link = $link;
    }

    public function asLink($url)
    {
        $this->link = $url;
        return $this;
    }


    function transform(array $entity): View
    {
        return view('crudHelper::elements.button',[
            'button' => $this,
            'entity' => $entity
        ]);
    }

    public static function linkButton($key,$content,$link){
        return new Button($key,$content,null, null, [], $link );
    }

    public static function standard($key,$content){
        return new Button($key,$content);
    }
}
