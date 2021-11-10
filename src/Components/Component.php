<?php
namespace J3dyy\CrudHelper\Components;


use Illuminate\View\View;

abstract class  Component
{

    public $classes = null;
    public $id = null;

    /**
     * @param string|null $classes
     * @param string|null $id
     */
    public function __construct(string $classes = null, string $id = null)
    {
        $this->classes = $classes;
        $this->id = $id;
    }

    abstract function render(): View;

}
