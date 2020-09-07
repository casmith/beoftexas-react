<?php
declare(strict_types=1);

namespace App\Domain\Article;

interface ArticleRepository
{
    /**
     * @return Article[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Article
     * @throws ArticleNotFoundException
     */
    public function findArticleOfId(int $id): Article;
}
