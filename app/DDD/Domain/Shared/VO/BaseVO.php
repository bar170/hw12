<?php
namespace App\DDD\Domain\Shared\VO;

abstract class BaseVO
{
    public function value(): mixed
    {
        return $this->value;
    }
}
