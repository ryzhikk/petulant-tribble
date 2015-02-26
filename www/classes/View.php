<?php
class View
{

    public $data;
    public $address;

    public function data($item)
    {
        $this->data = $item;

    }

    public function display($section, $act)
    {
        $this->address = __DIR__ . '/../views/' . $section . '/' . $act . '.php';
        require $this->address;
    }
}