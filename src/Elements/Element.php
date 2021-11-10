<?php

namespace J3dyy\CrudHelper\Elements;

use Illuminate\View\View;

abstract class Element
{
    public $type;
    public $key;
    public $content;

    public $classes = null;
    public $id = null;

    public $dataAttrs = [];
    public $label;

    /**
     * @param $type
     * @param $key
     * @param $content
     * @param null $classes
     * @param null $id
     */
    public function __construct($type, $key, $content, $classes = null, $id = null, array $dataAttrs = [])
    {
        $this->type = $type;
        $this->key = $key;
        $this->content = $content;
        $this->label = $content;
        $this->classes = $classes;
        $this->id = $id;
        $this->dataAttrs = $dataAttrs;
    }


    /**
     * @param array $dataAttrs
     */
    public function setDataAttrs(array $dataAttrs): void
    {
        $this->dataAttrs = $dataAttrs;
    }

    abstract function transform(array $entity): View;

}
