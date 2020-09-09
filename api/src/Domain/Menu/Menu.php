<?php
declare(strict_types=1);

namespace App\Domain\Menu;

use JsonSerializable;

class Menu implements JsonSerializable {
    private $id;
    private $title;
    private $link;
    private $parent;

    public function __construct(?int $id, string $title, string $link, ?int $parent) {
        $this->id = $id;
        $this->title = $title;
        $this->link = $link;
        $this->parent = $parent;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getLink(): string {
        return $this->link;
    }

    public function getParent(): ?int {
        return $this->parent;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'link' => $this->link,
            'parent' => $this->parent
        ];
    }
}
