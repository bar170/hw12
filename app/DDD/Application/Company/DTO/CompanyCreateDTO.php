<?php
namespace App\DDD\Application\Company\DTO;

use App\DDD\Domain\Company\VO\DescriptionVO;
use App\DDD\Domain\Company\VO\NameVO;

readonly class CompanyCreateDTO
{
    public function __construct(
        public NameVO $name,
        public DescriptionVO $description
    )
    {
    }
}
