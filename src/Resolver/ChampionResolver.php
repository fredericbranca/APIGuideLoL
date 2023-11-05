<?php

namespace App\Resolver;

use ApiPlatform\GraphQl\Resolver\QueryItemResolverInterface;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Document\Champion;

class ChampionResolver implements QueryItemResolverInterface
{
    private $documentManager;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function __invoke(?object $item, array $context): object
    {
        $id = $context['args']['idChamp'];
        return $this->documentManager->getRepository(Champion::class)->findOneBy(['idChamp' => $id]);
    }
}
