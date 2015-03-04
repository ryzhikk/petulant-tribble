<?php
class View
{

    public $data;
    public $address;

    public function __set($name, $val)
    {
        $this->data[$name] = $val;
    }

    public function __get($k)
    {
        return $this->data[$k];
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