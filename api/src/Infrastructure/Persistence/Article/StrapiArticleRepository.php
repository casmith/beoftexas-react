<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Article;

use App\Domain\Article\Article;
use App\Domain\Article\ArticleNotFoundException;
use App\Domain\Article\ArticleRepository;

class StrapiArticleRepository implements ArticleRepository
{
    /**
     * @var Article[]
     */
    private $articles;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $users
     */
    public function __construct(array $users = null)
    {
        $this->articles = $articles ?? [
            1 => new Article(1, 'Article 1', 'Body'),
            2 => new Article(2, 'Article 2', 'Body'),
            3 => new Article(3, 'Article 3', 'Body')
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->articles);
    }

    /**
     * {@inheritdoc}
     */
    public function findArticleOfId(int $id): Article
    {
        if (!isset($this->articles[$id])) {
            throw new ArticleNotFoundException();
        }

        return $this->articles[$id];
    }
}
