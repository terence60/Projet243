<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250814143232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualites (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, photo_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_75315B6DBCF5E72D (categorie_id), UNIQUE INDEX UNIQ_75315B6D7E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actualites ADD CONSTRAINT FK_75315B6DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE actualites ADD CONSTRAINT FK_75315B6D7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualites DROP FOREIGN KEY FK_75315B6DBCF5E72D');
        $this->addSql('ALTER TABLE actualites DROP FOREIGN KEY FK_75315B6D7E9E4C8C');
        $this->addSql('DROP TABLE actualites');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE photo');
    }
}
