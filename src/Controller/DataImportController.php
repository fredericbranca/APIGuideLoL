<?php

namespace App\Controller;

use App\Document\Champion;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DataImportController extends AbstractController
{
    #[Route('/import-champion', name: 'import_champion')]
    public function importData(DocumentManager $dm)
    { {
            $json = file_get_contents('championFull.json');
            $data = json_decode($json, true);

            foreach ($data as $id => $championData) {
                // Recherche du champion par son ID
                $championExiste = $dm->getRepository(Champion::class)->findOneBy(['id' => $id]);

                // Si le champion n'existe pas encore, on le crée
                if ($championExiste == null) {
                    $champion = new Champion();
                    $champion->setId($id);
                    $champion->setIdChamp($championData['id']);
                    $champion->setKey($championData['key']);
                    $champion->setName($championData['name']);
                    $champion->setTitle($championData['title']);
                    $champion->setImage($championData['image']);
                    $champion->setSkins($championData['skins']);
                    $champion->setLore($championData['lore']);
                    $champion->setBlurb($championData['blurb']);
                    $champion->setTags($championData['tags']);
                    $champion->setPartype($championData['partype']);
                    $champion->setSpells($championData['spells']);
                    $champion->setPassive($championData['passive']);
                    $dm->persist($champion);
                } else {
                    $championExiste->setIdChamp($championData['id']);
                    $championExiste->setKey($championData['key']);
                    $championExiste->setName($championData['name']);
                    $championExiste->setTitle($championData['title']);
                    $championExiste->setImage($championData['image']);
                    $championExiste->setSkins($championData['skins']);
                    $championExiste->setLore($championData['lore']);
                    $championExiste->setBlurb($championData['blurb']);
                    $championExiste->setTags($championData['tags']);
                    $championExiste->setPartype($championData['partype']);
                    $championExiste->setSpells($championData['spells']);
                    $championExiste->setPassive($championData['passive']);
                    $dm->persist($championExiste);
                }
            }

            $dm->flush();

            return new Response('Champions importés ou mise à jour avec succès !');
        }
    }
}
