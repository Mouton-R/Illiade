<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230109160223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movies DROP FOREIGN KEY FK_C61EED30BCF5E72D');
        $this->addSql('DROP INDEX IDX_C61EED30BCF5E72D ON movies');
        $this->addSql('ALTER TABLE movies CHANGE categorie_id categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE movies ADD CONSTRAINT FK_C61EED30A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_C61EED30A21214B7 ON movies (categories_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movies DROP FOREIGN KEY FK_C61EED30A21214B7');
        $this->addSql('DROP INDEX IDX_C61EED30A21214B7 ON movies');
        $this->addSql('ALTER TABLE movies CHANGE categories_id categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE movies ADD CONSTRAINT FK_C61EED30BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_C61EED30BCF5E72D ON movies (categorie_id)');
    }
}
