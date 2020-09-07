<?php
declare(strict_types=1);

namespace App\Application\Actions\Article;

use Psr\Http\Message\ResponseInterface as Response;

class ViewArticleAction extends ArticleAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $id = (int) $this->resolveArg('id');
        $article = $this->articleRepository->findArticleOfId($id);

        // $this->logger->info("User of id `${userId}` was viewed.");

        return $this->respondWithData($article);
    }
}
