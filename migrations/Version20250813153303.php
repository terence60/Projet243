<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250813153303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualites_categorie (actualites_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_27C88B2D2EDF1993 (actualites_id), INDEX IDX_27C88B2DBCF5E72D (categorie_id), PRIMARY KEY(actualites_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actualites_photo (actualites_id INT NOT NULL, photo_id INT NOT NULL, INDEX IDX_7F8BBFA52EDF1993 (actualites_id), INDEX IDX_7F8BBFA57E9E4C8C (photo_id), PRIMARY KEY(actualites_id, photo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actualites_categorie ADD CONSTRAINT FK_27C88B2D2EDF1993 FOREIGN KEY (actualites_id) REFERENCES actualites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualites_categorie ADD CONSTRAINT FK_27C88B2DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualites_photo ADD CONSTRAINT FK_7F8BBFA52EDF1993 FOREIGN KEY (actualites_id) REFERENCES actualites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualites_photo ADD CONSTRAINT FK_7F8BBFA57E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualites_categorie DROP FOREIGN KEY FK_27C88B2D2EDF1993');
        $this->addSql('ALTER TABLE actualites_categorie DROP FOREIGN KEY FK_27C88B2DBCF5E72D');
        $this->addSql('ALTER TABLE actualites_photo DROP FOREIGN KEY FK_7F8BBFA52EDF1993');
        $this->addSql('ALTER TABLE actualites_photo DROP FOREIGN KEY FK_7F8BBFA57E9E4C8C');
        $this->addSql('DROP TABLE actualites_categorie');
        $this->addSql('DROP TABLE actualites_photo');
    }
}
