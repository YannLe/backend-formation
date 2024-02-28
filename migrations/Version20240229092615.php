<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229092615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allegeance (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_allegeance (personnage_id INT NOT NULL, allegeance_id INT NOT NULL, INDEX IDX_549F640B5E315342 (personnage_id), INDEX IDX_549F640B6815D25C (allegeance_id), PRIMARY KEY(personnage_id, allegeance_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnage_allegeance ADD CONSTRAINT FK_549F640B5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_allegeance ADD CONSTRAINT FK_549F640B6815D25C FOREIGN KEY (allegeance_id) REFERENCES allegeance (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage_allegeance DROP FOREIGN KEY FK_549F640B5E315342');
        $this->addSql('ALTER TABLE personnage_allegeance DROP FOREIGN KEY FK_549F640B6815D25C');
        $this->addSql('DROP TABLE allegeance');
        $this->addSql('DROP TABLE personnage_allegeance');
    }
}
