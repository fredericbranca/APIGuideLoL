<?php

namespace App\Controller;

use App\Document\Item;
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
    {
        // Supprimer toutes les entrées existantes de la table des champions
        $dm->createQueryBuilder(Champion::class)
            ->remove()
            ->getQuery()
            ->execute();

        $json = file_get_contents('data/championFull.json');
        $data = json_decode($json, true)['data'];

        foreach ($data as $id => $championData) {
            $champion = new Champion();
            $champion->setId($id);
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

            $dm->persist($champion);
        }

        $dm->flush();

        return new Response('Champions importés avec succès !');
    }

    // Route pour importer les runes
    #[Route('/import-rune', name: 'import_rune')]
    public function importDataRune(DocumentManager $dm)
    {
        // Supprimer toutes les entrées existantes de la table des runes
        $dm->createQueryBuilder(Rune::class)
            ->remove()
            ->getQuery()
            ->execute();

        $json = file_get_contents('data/runesReforged.json');
        $data = json_decode($json, true);

        foreach ($data as $runeData) {
            $rune = new Rune();

            // Assumons que l'ID de la rune est 'key'
            $rune->setId($runeData['key']);
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

            $dm->persist($rune);
        }

        $dm->flush();

        return new Response('Runes importées avec succès !');
    }

    // Route pour importer les sorts d'invocateur
    #[Route('/import-summoner', name: 'import_summoner')]
    public function importSummonerSpells(DocumentManager $dm)
    {
        // Supprimer toutes les entrées existantes de la table des sorts d'invocateur
        $dm->createQueryBuilder(SortInvocateur::class)
            ->remove()
            ->getQuery()
            ->execute();

        $json = file_get_contents('data/summoner.json');
        $data = json_decode($json, true)['data'];

        foreach ($data as $spellData) {
            $spell = new SortInvocateur();

            // Assumons que l'ID du sort est 'id'
            $spell->setId($spellData['id']);
            $spell->setIdSort($spellData['id']);
            $spell->setName($spellData['name']);
            $spell->setDescription($spellData['description']);
            $spell->setCooldown($spellData['cooldownBurn']);
            $spell->setModes($spellData['modes']);
            $spell->setRange($spellData['rangeBurn']);
            $spell->setImage($spellData['image']['full']);

            $dm->persist($spell);
        }

        $dm->flush();

        return new Response('Sorts d\'invocateur importés avec succès !');
    }

    // Route pour importer les items dans la base de données
    #[Route('/import-item', name: 'import_item')]
    public function importDataItem(DocumentManager $dm)
    {
        // Supprimer toutes les entrées existantes de la table des items
        $dm->createQueryBuilder(Item::class)
            ->remove()
            ->getQuery()
            ->execute();

        $json = file_get_contents('data/item.json');
        $data = json_decode($json, true)['data'];

        foreach ($data as $id => $itemData) {
            if ($id < 200000 && $id != 3600 && $id != 4403) {
                $item = new Item();
                $item->setId($id);
                $item->setName($itemData['name']);
                if (isset($itemData['inStore'])) {
                    $item->setInStore($itemData['inStore']);
                } else {
                    $item->setInStore(true);
                }
                $item->setDescription($itemData['description']);
                $item->setImage($itemData['image']['full']);
                $item->setGold($itemData['gold']);
                $item->setTags($itemData['tags']);

                $dm->persist($item);
            }
        }

        $dm->flush();

        return new Response('Items importés avec succès !');
    }
}
