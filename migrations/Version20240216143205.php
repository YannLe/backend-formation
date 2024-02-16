<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240216143205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE allegeance ADD description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE personnage ADD description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE race ADD description VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE allegeance DROP description');
        $this->addSql('ALTER TABLE personnage DROP description');
        $this->addSql('ALTER TABLE race DROP description');
    }
}
