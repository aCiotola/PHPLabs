<?php
class Payroll
{
    public static $id;
    public static $name;
    
    public function __construct($id = 0, $name)
    {
        self::$id = $id;
        self::$name = $name;
    }

    public function getName()
    {
        return self::$name;
    }
    
    public function getId()
    {
        return self::$id;
    }
}
?>