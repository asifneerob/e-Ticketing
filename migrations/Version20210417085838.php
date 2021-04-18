<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210417085838 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ticket_purchase (id INT NOT NULL, buses_id INT NOT NULL, pnr VARCHAR(40) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E47E2DBA75521321 ON ticket_purchase (buses_id)');
        $this->addSql('ALTER TABLE ticket_purchase ADD CONSTRAINT FK_E47E2DBA75521321 FOREIGN KEY (buses_id) REFERENCES buses (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE buses ADD routes_from_id INT NOT NULL');
        $this->addSql('ALTER TABLE buses ADD CONSTRAINT FK_FE00EAF3966F01EA FOREIGN KEY (routes_from_id) REFERENCES buses_routes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_FE00EAF3966F01EA ON buses (routes_from_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE ticket_purchase');
        $this->addSql('ALTER TABLE buses DROP CONSTRAINT FK_FE00EAF3966F01EA');
        $this->addSql('DROP INDEX IDX_FE00EAF3966F01EA');
        $this->addSql('ALTER TABLE buses DROP routes_from_id');
    }
}
