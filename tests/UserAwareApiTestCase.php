<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use ApiPlatform\Symfony\Bundle\Test\Client;
use App\Entity\User;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

abstract class UserAwareApiTestCase extends ApiTestCase
{
    public const BASE_URI = 'https://localhost:8001';
    public const AUTH_ROUTE = '/auth';

    public static function createAdminUser(string $username = 'testAdmin', string $password = '$3cret'): User
    {
        return self::createBaseUser($username, $password, ['ROLE_ADMIN']);
    }

    public static function createUser(string $username = 'testUser', string $password = '$3cret'): User
    {
        return self::createBaseUser($username, $password, ['ROLE_USER']);
    }

    public static function createBaseUser(string $username, string $password, $roles): User
    {
        $container = self::getContainer();

        $user = new User();
        $user->setUsername($username);
        $user->setRoles($roles);
        $user->setPlainPassword($password);
        $user->setPassword(
            $container->get('security.user_password_hasher')->hashPassword($user, $password)
        );

        $manager = $container->get('doctrine')->getManager();
        $manager->persist($user);
        $manager->flush();
        return $user;
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public static function getClientWithTokenUser(bool $patch = false): Client
    {
        return self::createClientFromUser(self::createUser(), $patch);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public static function getClientWithTokenAdmin(bool $patch = false): Client
    {
        return self::createClientFromUser(self::createAdminUser(), $patch);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public static function createClientFromUser(User $user, bool $patch = false): Client
    {
        $client = self::createClient(defaultOptions: ['base_uri' => self::BASE_URI]);
        $response = $client->request('POST',
            self::AUTH_ROUTE, [
                'headers' => ['Content-Type' => 'application/json'],
                'json'    => [
                    'username' => $user->getUsername(),
                    'password' => $user->getPlainPassword(),
                ],
            ]);
        $json     = $response->toArray();
        return self::createClient(
            defaultOptions: [
                'base_uri'    => self::BASE_URI,
                'headers'     => [
                    'Content-Type' => $patch ? 'application/merge-patch+json' : 'application/ld+json',
                    'accept'       => 'application/ld+json',
                ],
                'auth_bearer' => $json['token']
            ]);
    }
}