<?php
namespace App\DDD\VO\Company;

use App\DDD\VO\BaseVO;

class DescriptionVO extends BaseVO
{
    public function __construct(string $description)
    {
        $this->value = $description;
    }
}
