<?php
// tests/AuthenticationTest.php


use App\Entity\Personnage;
use App\Entity\Race;
use App\Tests\UserAwareApiTestCase;
use Symfony\Component\HttpFoundation\Response;
use  Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PersonnageTest extends UserAwareApiTestCase
{
    public function testGetPersonnageList(): void
    {
        $client = self::getClientWithTokenUser();
        // test authorized
        $response = $client->request('GET', '/api/personnages');
        self::assertResponseIsSuccessful();
    }

    public function testCreatePersonnage(): void
    {
        $clientUser = self::getClientWithTokenUser();
        $race       = self::createRace('Humain');
        // test not authorized
        $clientUser->request('POST', '/api/personnages',
            [
                'json' => [
                    'nom'  => 'Aragorn',
                    'race' => $this->findIriBy(Race::class, ['id' => $race->getId()])
                ],
            ]
        );
        self::assertResponseStatusCodeSame(Response::HTTP_FORBIDDEN);
        // test authorized
        $clientAdmin = self::getClientWithTokenAdmin();
        $response    = $clientAdmin->request('POST', '/api/personnages',
            [
                'json' => [
                    'nom'  => 'Aragorn',
                    'race' => $this->findIriBy(Race::class, ['id' => $race->getId()])
                ],
            ]
        );
        self::assertResponseIsSuccessful();
    }


    public function testUpdatePersonnage(): void
    {
        $newDescription = 'Roi du gondor';
        $humain         = self::createRace('Humain');
        $nain           = self::createRace('Nain');
        $personnage     = self::createPersonnage('Aragorn', $humain, 'Rodeur du nord');
//        // test not authorized
        self::getClientWithTokenUser(true)->request('PATCH',
            $this->findIriBy(Personnage::class, ['id' => $personnage->getId()]),
            [
                'json' => [
                    'nom'         => 'Eomer',
                    'description' => $newDescription,
                    'race'        => $this->findIriBy(Race::class, ['id' => $humain->getId()])
                ],
            ]
        );
        self::assertResponseStatusCodeSame(Response::HTTP_FORBIDDEN);

        // test authorized
        self::getClientWithTokenAdmin(true)->request('PATCH',
            $this->findIriBy(Personnage::class, ['id' => $personnage->getId()]),
            [
                'json' => [
                    'description' => $newDescription,
                    'nom'         => 'Arathorn',
                    'race'        => $this->findIriBy(Race::class, ['id' => $nain->getId()])
                ],
            ]
        );
        self::assertResponseIsSuccessful();
        self::assertJsonContains([
            '@context'    => '/api/contexts/Personnage',
            'id'          => $personnage->getId(),
            'nom'         => 'Aragorn',
            'race'        => $this->findIriBy(Race::class, ['id' => $humain->getId()]),
            'description' => $newDescription
        ]);
    }

    public static function createRace(string $name): Race
    {
        $container = self::getContainer();
        $race      = new Race();
        $race->setNom($name);
        $manager = $container->get('doctrine')->getManager();
        $manager->persist($race);
        $manager->flush();
        return $race;
    }

    public static function createPersonnage(string $name, Race $race, string $description): Personnage
    {
        $personnage = (new Personnage())
            ->setNom($name)
            ->setRace($race)
            ->setDescription($description);
        $container  = self::getContainer();
        $manager    = $container->get('doctrine')->getManager();
        $manager->persist($personnage);
        $manager->flush();
        return $personnage;
    }

}