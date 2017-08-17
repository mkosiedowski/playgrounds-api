<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170817101247 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE feature CHANGE name name JSON NOT NULL');
        $this->addSql('ALTER TABLE openingHours DROP FOREIGN KEY FK_F07B24B9F17E51F5');
        $this->addSql('ALTER TABLE openingHours ADD CONSTRAINT FK_F07B24B9F17E51F5 FOREIGN KEY (playgroundId) REFERENCES playground (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo CHANGE sizes sizes JSON NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE feature CHANGE name name JSON NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE openingHours DROP FOREIGN KEY FK_F07B24B9F17E51F5');
        $this->addSql('ALTER TABLE openingHours ADD CONSTRAINT FK_F07B24B9F17E51F5 FOREIGN KEY (playgroundId) REFERENCES playground (id)');
        $this->addSql('ALTER TABLE photo CHANGE sizes sizes JSON NOT NULL COMMENT \'(DC2Type:json)\'');
    }
}
