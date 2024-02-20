<?php
// tests/AuthenticationTest.php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;


class AuthenticationTest extends ApiTestCase
{

    public const USER = 'testUser';
    public const PASSWORD = '$3CR3T';

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function testLogin(): void
    {
        $client = self::createClient();
        $client->withOptions(['base_uri' => 'https://localhost:8001',]);
        $container = self::getContainer();
        $manager = $container->get('doctrine')->getManager();


        $user = new User();
        $user->setUsername(self::USER);
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword(
            $container->get('security.user_password_hasher')->hashPassword($user, self::PASSWORD)
        );

        $manager->persist($user);
        $manager->flush();

        // retrieve a token
        $response = $client->request('POST', '/auth', [
            'headers' => ['Content-Type' => 'application/json'],
            'json'    => [
                'username' => self::USER,
                'password' => self::PASSWORD,
            ],
        ]);

        $json = $response->toArray();
        self::assertResponseIsSuccessful();
        $this->assertArrayHasKey('token', $json);

        // test not authorizedgi
        $client->request('GET', '/api/personnages');
        self::assertResponseStatusCodeSame(Response::HTTP_UNAUTHORIZED);
        // test authorized
        $response = $client->request('GET', '/api/personnages', ['auth_bearer' => $json['token']]);
        self::assertResponseIsSuccessful();
    }
}