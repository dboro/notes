<?php

namespace App\Dto\Notes;

use App\Dto\ToArray;

class StoreDto
{
    use ToArray;
    public function __construct(
        public string $title,
        public string $content,
        public int $user_id
    ) {}
}
