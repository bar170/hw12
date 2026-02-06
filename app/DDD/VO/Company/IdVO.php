<?php
namespace App\DDD\VO\Company;

use App\DDD\VO\BaseVO;

class IdVO extends BaseVO
{
    public function __construct(int | string $id)
    {
        $this->value = (int) $id;
    }
}
