<?php
declare(strict_types=1);

namespace App\Domain\Article;

use JsonSerializable;

class Article implements JsonSerializable
{
    private $id;
    private $title;
    private $body;

    /**
     * @param int|null  $id
     * @param string    $title
     * @param string    $body
     */
    public function __construct(?int $id, string $title, string $body) {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body
        ];
    }
}
