<?php
declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Domain\Article\ArticleRepository;
use App\Domain\Menu\MenuRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use App\Infrastructure\Persistence\Article\StrapiArticleRepository;
use App\Infrastructure\Persistence\Menu\StrapiMenuRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        ArticleRepository::class => \DI\autowire(StrapiArticleRepository::class),
        MenuRepository::class => \DI\autowire(StrapiMenuRepository::class)
    ]);
};
