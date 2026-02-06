<?php
namespace App\DDD\VO;

abstract class BaseVO
{
    protected $value;
    public function value()
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value();
    }
}
