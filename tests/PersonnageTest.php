<?php

namespace App\Tests;

use App\Entity\Personnage;
use App\Entity\Race;
use Symfony\Component\HttpFoundation\Request;

class PersonnageTest extends LotrTestCase
{
    public const BASE_URI = '/api/personnages';

    private static function createPersonnage(string $name, Race $race): Personnage
    {
        return (new Personnage())
            ->setRace($race)
            ->setName($name);
    }

    private static function createRace(string $name): Race
    {
        return (new Race)->setNom($name);
    }

    public
    function testGetListPersonnages(): void
    {
        $race         = self::createRace(name: 'Humain');
        $aragorn      = self::createPersonnage(name: 'Aragorn', race: $race);
        $persistables = [$race, $aragorn];
        self::persist($persistables);

        static::createClient()->request(Request::METHOD_GET, self::BASE_URI);

        self::assertResponseIsSuccessful();
        self::assertJsonContains([
                "@context"         => "/api/contexts/Personnage",
                "@id"              => "/api/personnages",
                "@type"            => "hydra:Collection",
                "hydra:totalItems" => 1,
                "hydra:member"     => [
                    [
                        "@id"   => $this->getIriFromResource($aragorn),
                        "@type" => "Personnage",
                        "id"    => $aragorn->getId(),
                        "name"  => $aragorn->getName(),
                        "race"  => $this->getIriFromResource($race)
                    ]
                ],
            ]
        );
    }
}
