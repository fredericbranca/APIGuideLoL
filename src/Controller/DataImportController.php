<?php

namespace App\Controller;

use App\Document\Rune;
use App\Document\Champion;
use App\Document\SortInvocateur;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DataImportController extends AbstractController
{
    // Route pour importer les champions dans la base de données
    #[Route('/import-champion', name: 'import_champion')]
    public function importDataChampion(DocumentManager $dm)
    { {
            $json = file_get_contents('data/championFull.json');
            $data = json_decode($json, true)['data'];

            foreach ($data as $id => $championData) {
                // Recherche du champion par son ID
                $champion = $dm->getRepository(Champion::class)->findOneBy(['id' => $id]);

                // Création du champion s'il n'existe pas encore
                if (!$champion) {
                    $champion = new Champion;
                    $champion->setId($id);
                    $dm->persist($champion);
                }

                $champion->setIdChamp($championData['id']);
                $champion->setKey($championData['key']);
                $champion->setName($championData['name']);
                $champion->setTitle($championData['title']);
                $champion->setImage($championData['image']['full']);
                $champion->setSkins($championData['skins']);
                $champion->setLore($championData['lore']);
                $champion->setBlurb($championData['blurb']);
                $champion->setTags($championData['tags']);
                $champion->setPartype($championData['partype']);
                $champion->setSpells($championData['spells']);
                $champion->setPassive($championData['passive']);
            }

            $dm->flush();

            return new Response('Champions importés ou mise à jour avec succès !');
        }
    }

    // Route pour importer les runes
    #[Route('/import-rune', name: 'import_rune')]
    public function importData(DocumentManager $dm)
    {
        $json = file_get_contents('data/runesReforged.json');
        $data = json_decode($json, true);

        foreach ($data as $id => $runeData) {
            // Recherche de la rune par son ID
            $rune = $dm->getRepository(Rune::class)->findOneBy(['id' => $id]);

            // Création de la rune si elle n'existe pas encore
            if (!$rune) {
                $rune = new Rune;
                $rune->setId($runeData['key']);
                $dm->persist($rune);
            }

            $rune->setIdRune($runeData['id']);
            $rune->setKey($runeData['key']);
            $rune->setIcon($runeData['icon']);
            $rune->setName($runeData['name']);

            $slots = $runeData['slots'];
            if (isset($slots[0])) {
                $primaryValue = $slots[0];
                unset($slots[0]);
                $slots = ['Primary' => $primaryValue] + $slots;
            }

            $rune->setSlots($slots);
        }

        $dm->flush();

        return new Response('Runes importées ou mise à jour avec succès !');
    }

    // Route pour importer les sorts d'invocateur
    #[Route('/import-summoner', name: 'import_summoner')]
    public function importSummonerSpells(DocumentManager $dm)
    {
        $json = file_get_contents('data/summoner.json');
        $data = json_decode($json, true)['data'];

        foreach ($data as $id => $spellData) {
            // Recherche du sort d'invocateur par son ID
            $spell = $dm->getRepository(SortInvocateur::class)->findOneBy(['id' => $id]);

            // Création du sort d'invocateur s'il n'existe pas encore
            if (!$spell) {
                $spell = new SortInvocateur;
                $spell->setId($spellData['id']);
                $dm->persist($spell);
            }

            $spell->setIdSort($spellData['id']);
            $spell->setName($spellData['name']);
            $spell->setDescription($spellData['description']);
            $spell->setCooldown($spellData['cooldownBurn']);
            $spell->setModes($spellData['modes']);
            $spell->setRange($spellData['rangeBurn']);
            $spell->setImage($spellData['image']['full']);
        }

        $dm->flush();

        return new Response('Sorts d\'invocateur importés ou mis à jour avec succès !');
    }
}
