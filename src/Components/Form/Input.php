<?php

namespace J3dyy\CrudHelper\Components\Form;

use Illuminate\View\View;
use J3dyy\CrudHelper\Elements\Element;
use J3dyy\CrudHelper\Elements\ElementTypes;

class Input extends Element
{
    public $validator = '';
    public $value = '';

    public $length = null;
    public $default = null;
    public $nullable = false;


    public function __construct($type, $key, $content, $classes = null, $id = null, array $dataAttrs = [])
    {
        $this->value = $content;
        parent::__construct($type, $key, $content, $classes, $id, $dataAttrs);
    }

    public static function formLayout($item, $content = ''){
        $input = new Input($item['type'],$item['name'],$content);
        $input->setDefault($item['default']);
        $input->setLength($item['length']);
        return $input;
    }

    /**
     * @param null $length
     */
    public function setLength($length): void
    {
        $this->length = $length;
    }

    /**
     * @param null $default
     */
    public function setDefault($default): void
    {
        $this->default = $default;
    }

    /**
     * @param bool $nullable
     */
    public function setNullable(bool $nullable): void
    {
        $this->nullable = $nullable;
    }



    public static function text($key,$value, $classes = 'form-control'){
        return new Input(ElementTypes::TEXT, $key,$value, $classes);
    }

    public static function image($key, $value, $classes = 'form-control'){
        return new Input(ElementTypes::IMAGE, $key,$value,$classes);
    }

    public static function hidden($key,$value){
        return new Input(ElementTypes::HIDDEN, $key, $value);
    }

    function transform(array $entity): View
    {
        return view('crudHelper::form.input',[
            'input' => $this,
            'entity' => $entity
        ]);
    }
}
