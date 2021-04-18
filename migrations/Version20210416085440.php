<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416085440 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE buses_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE buses_routes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE buses (id INT NOT NULL, buses_routes_id INT NOT NULL, bus_id VARCHAR(20) NOT NULL, bus_name VARCHAR(40) NOT NULL, seats VARCHAR(40) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FE00EAF38392CAAA ON buses (buses_routes_id)');
        $this->addSql('CREATE TABLE buses_routes (id INT NOT NULL, route_id VARCHAR(40) NOT NULL, routes_from VARCHAR(40) NOT NULL, routes_to VARCHAR(40) NOT NULL, time TIME(0) WITHOUT TIME ZONE NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE buses ADD CONSTRAINT FK_FE00EAF38392CAAA FOREIGN KEY (buses_routes_id) REFERENCES buses_routes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE buses DROP CONSTRAINT FK_FE00EAF38392CAAA');
        $this->addSql('DROP SEQUENCE buses_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE buses_routes_id_seq CASCADE');
        $this->addSql('DROP TABLE buses');
        $this->addSql('DROP TABLE buses_routes');
    }
}
