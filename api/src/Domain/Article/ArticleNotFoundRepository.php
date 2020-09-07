<?php
declare(strict_types=1);

namespace App\Domain\Article;

use App\Domain\DomainException\DomainRecordNotFoundException;

class ArticleNotFoundRepository extends DomainRecordNotFoundException
{
    public $message = 'The article you requested does not exist.';
}
