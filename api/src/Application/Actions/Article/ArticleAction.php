<?php
declare(strict_types=1);

namespace App\Application\Actions\Article;

use App\Application\Actions\Action;
use App\Domain\Article\ArticleRepository;
use Psr\Log\LoggerInterface;

abstract class ArticleAction extends Action
{
    protected $articleRepository;

    public function __construct(LoggerInterface $logger, ArticleRepository $articleRepository)
    {
        parent::__construct($logger);
        $this->articleRepository = $articleRepository;
    }
}
