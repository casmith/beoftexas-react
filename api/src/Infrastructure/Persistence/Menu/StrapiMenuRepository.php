<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Menu;

use App\Domain\Menu\Menu;
use App\Domain\Menu\MenuRepository;

use Psr\Log\LoggerInterface;

class StrapiMenuRepository implements MenuRepository {
    
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
        $result = $this->api->get('/menus');
        return array_map(function($v) {
            return $this->toMenu($v);
        }, $result->decode_response());
    }

    public function toMenu($obj) {
        $link = $obj["link"];
        if (!$link) $link = "";
        return new Menu($obj["id"], $obj["title"], $link, $obj["parent"] ? $obj["parent"]["id"] : null);
    }
}
?>