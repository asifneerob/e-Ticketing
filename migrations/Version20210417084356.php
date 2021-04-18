<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210417084356 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket_purchase ADD routes_from_id INT NOT NULL');
        $this->addSql('ALTER TABLE ticket_purchase ADD CONSTRAINT FK_E47E2DBA966F01EA FOREIGN KEY (routes_from_id) REFERENCES buses_routes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_E47E2DBA966F01EA ON ticket_purchase (routes_from_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ticket_purchase DROP CONSTRAINT FK_E47E2DBA966F01EA');
        $this->addSql('DROP INDEX IDX_E47E2DBA966F01EA');
        $this->addSql('ALTER TABLE ticket_purchase DROP routes_from_id');
    }
}
