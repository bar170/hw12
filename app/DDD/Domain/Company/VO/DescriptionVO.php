<?php
namespace App\DDD\Domain\Company\VO;

use App\DDD\Domain\Shared\VO\BaseVO;

class DescriptionVO extends BaseVO
{
    public function __construct(public readonly string $value)
    {
    }
}
