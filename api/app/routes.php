<?php
declare(strict_types=1);

use App\Application\Actions\Article\ListArticlesAction;
use App\Application\Actions\Article\ViewArticleAction;
use App\Application\Actions\Menu\ListMenusAction;

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/articles', function (Group $group) {
        $group->get('', ListArticlesAction::class);
        $group->get('/{id}', ViewArticleAction::class);
    });
    $app->group('/menus', function (Group $group) {
        $group->get('', ListMenusAction::class);
    });
};
