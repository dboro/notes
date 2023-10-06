<?php

namespace App\Dto\Notes;

use App\Dto\ToArray;

class UpdateDto
{
    use ToArray;
    public function __construct(
        public string $id,
        public string $title,
        public string $content,
    ) {}
}
