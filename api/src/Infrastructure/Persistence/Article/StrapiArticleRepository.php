<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Article;

use App\Domain\Article\Article;
use App\Domain\Article\ArticleNotFoundException;
use App\Domain\Article\ArticleRepository;

use Psr\Log\LoggerInterface;

class StrapiArticleRepository implements ArticleRepository
{
    private $articles;

    public function __construct(LoggerInterface $logger) {
        $this->api = new \RestClient([
            'base_url' => 'http://localhost:1337',
            'user_agent' => "beoftexas/0.1"
        ]);
        
        $this->api->register_decoder('json', function($data){
            return json_decode($data, TRUE);
        });

        $this->logger = $logger;
    }

    public function findAll(): array {
        $result = $this->api->get('/articles');
        return array_map(function($v) {
            return $this->toArticle($v);
        }, $result->decode_response());
    }

    public function findArticleOfId(int $id): Article {
        $result = $this->api->get("/articles/${id}");
        return $this->toArticle($result->decode_response());
    }

    public function toArticle($obj) {
        return new Article($obj["id"], $obj["title"], $obj["body"]);
    }
}
