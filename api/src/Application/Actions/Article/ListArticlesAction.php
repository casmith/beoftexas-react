<?php
declare(strict_types=1);

namespace App\Application\Actions\Article;

use Psr\Http\Message\ResponseInterface as Response;

class ListArticlesAction extends ArticleAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $articles = $this->articleRepository->findAll();

        // $this->logger->info("Users list was viewed.");

        return $this->respondWithData($articles);
    }
}
