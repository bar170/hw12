<?php
namespace App\DDD\DTO;

use App\DDD\VO\Company\DescriptionVO;
use App\DDD\VO\Company\IdVO;
use App\DDD\VO\Company\NameVO;

class CompanyDTO
{
    public function __construct(
        public readonly IdVO $companyId,
        public readonly NameVO $name,
        public readonly DescriptionVO $description
    )
    {
    }
}
