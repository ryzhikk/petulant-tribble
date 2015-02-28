<?php
class View
{

    public $data;
    public $address;

    public function assign($name, $value)
    {
        $this->data[$name] = $value;

    }

    public function __set($name, $val)
    {
        $this->data[$name] = $val;
    }

    public function display($section, $act)
    {
        if($this->data)
        {
            foreach ($this->data as $key => $value)
            {
                $$key = $value;
            }
        }
        $this->address = __DIR__ . '/../views/' . $section . '/' . $act . '.php';
        require $this->address;
    }
}