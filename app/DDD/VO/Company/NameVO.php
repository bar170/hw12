<?php
namespace App\DDD\VO\Company;

use App\DDD\VO\BaseVO;

class NameVO extends BaseVO
{
    public function __construct(string $name)
    {
        $this->value = $name;
    }
}
