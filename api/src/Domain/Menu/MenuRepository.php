<?php
declare(strict_types=1);

namespace App\Domain\Menu;

interface MenuRepository {
    public function findAll(): array;
}

?>
