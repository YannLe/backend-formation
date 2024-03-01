<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use Doctrine\ORM\EntityManagerInterface;

abstract class LotrTestCase extends ApiTestCase
{
    /**
     * @param array<object>|object $persistable
     * @return void
     */
    public static function persist(array|object $persistable)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = self::getContainer()->get('doctrine')->getManager();
        if (is_iterable($persistable)) {
            foreach ($persistable as $entity) {
                $entityManager->persist($entity);
            }
        } else {
            $entityManager->persist($persistable);
        }
        $entityManager->flush();
    }
}