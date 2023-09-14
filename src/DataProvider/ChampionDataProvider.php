<?php

// namespace App\DataProvider;

// use App\Document\Champion;
// use Doctrine\ORM\EntityManagerInterface;
// use ApiPlatform\State\ProviderInterface;

// class ChampionDataProvider implements ProviderInterface
// {
//     private $entityManager;

//     public function __construct(EntityManagerInterface $entityManager)
//     {
//         $this->entityManager = $entityManager;
//     }

//     public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
//     {
//         return Champion::class === $resourceClass;
//     }

//     public function getItem(string $resourceClass, $id, string $operationName = null, array $context = []): ?Champion
//     {
//         // Récupère le champion
//         return $this->entityManager->getRepository(Champion::class)->findOneBy(['data.id' => $id]);
//     }
// }