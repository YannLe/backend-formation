<?php

namespace App\Tests;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;


class AuthenticationTest extends UserAwareApiTestCase
{
    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function testLogin(): void
    {
        $client = self::createClient([], ['base_uri' => 'https://localhost:8001']);
        $user = self::createUser();

        // retrieve a token
        $response = $client->request('POST', '/auth', [
            'headers' => ['Content-Type' => 'application/json'],
            'json'    => [
                'username' => $user->getUsername(),
                'password' => $user->getPlainPassword(),
            ],
        ]);

        $json = $response->toArray();
        self::assertResponseIsSuccessful();
        $this->assertArrayHasKey('token', $json);

        // test not authorized
        $client->request('GET', '/api/personnages');
        self::assertResponseStatusCodeSame(Response::HTTP_UNAUTHORIZED);
        // test authorized
        $response = $client->request('GET', '/api/personnages', ['auth_bearer' => $json['token']]);
        self::assertResponseIsSuccessful();
    }
}