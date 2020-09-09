<?php
declare(strict_types=1);

namespace App\Application\Actions\Menu;

use Psr\Http\Message\ResponseInterface as Response;

class ListMenusAction extends MenuAction {
    
    protected function action(): Response {
        $menus = $this->menuRepository->findAll();
        return $this->respondWithData($menus);
    }
}
