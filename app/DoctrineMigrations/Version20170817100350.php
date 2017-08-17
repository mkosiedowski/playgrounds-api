<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170817100350 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE feature (id VARCHAR(255) NOT NULL, name JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE openingHours (day VARCHAR(255) NOT NULL, fromHour INT NOT NULL, fromMinutes INT NOT NULL, toHour INT NOT NULL, toMinutes INT NOT NULL, playgroundId VARCHAR(255) NOT NULL, INDEX IDX_F07B24B9F17E51F5 (playgroundId), PRIMARY KEY(day, playgroundId)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, sizes JSON NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playground (id VARCHAR(255) NOT NULL, name LONGTEXT NOT NULL, slug VARCHAR(255) DEFAULT NULL, location_address VARCHAR(255) NOT NULL, location_country VARCHAR(255) NOT NULL, location_city VARCHAR(255) NOT NULL, location_code VARCHAR(255) NOT NULL, location_district VARCHAR(255) NOT NULL, location_latitude DOUBLE PRECISION NOT NULL, location_longitude DOUBLE PRECISION NOT NULL, createdBy_ipAddress VARCHAR(45) NOT NULL, createdBy_username VARCHAR(255) NOT NULL, createdBy_time DATETIME NOT NULL, modifiedBy_ipAddress VARCHAR(45) NOT NULL, modifiedBy_username VARCHAR(255) NOT NULL, modifiedBy_time DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playgroundImage (playgroundId VARCHAR(255) NOT NULL, photoId VARCHAR(255) NOT NULL, INDEX IDX_7B2ADEDCF17E51F5 (playgroundId), INDEX IDX_7B2ADEDC42738825 (photoId), PRIMARY KEY(playgroundId, photoId)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playgroundFeature (playgroundId VARCHAR(255) NOT NULL, featureKey VARCHAR(255) NOT NULL, INDEX IDX_697F3B33F17E51F5 (playgroundId), INDEX IDX_697F3B33B4789000 (featureKey), PRIMARY KEY(playgroundId, featureKey)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playgroundsLogs (id INT AUTO_INCREMENT NOT NULL, action VARCHAR(8) NOT NULL, loggedAt DATETIME NOT NULL, objectId VARCHAR(64) DEFAULT NULL, objectClass VARCHAR(255) NOT NULL, version INT NOT NULL, data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', username VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE openingHours ADD CONSTRAINT FK_F07B24B9F17E51F5 FOREIGN KEY (playgroundId) REFERENCES playground (id)');
        $this->addSql('ALTER TABLE playgroundImage ADD CONSTRAINT FK_7B2ADEDCF17E51F5 FOREIGN KEY (playgroundId) REFERENCES playground (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playgroundImage ADD CONSTRAINT FK_7B2ADEDC42738825 FOREIGN KEY (photoId) REFERENCES photo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playgroundFeature ADD CONSTRAINT FK_697F3B33F17E51F5 FOREIGN KEY (playgroundId) REFERENCES playground (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playgroundFeature ADD CONSTRAINT FK_697F3B33B4789000 FOREIGN KEY (featureKey) REFERENCES feature (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE playgroundFeature DROP FOREIGN KEY FK_697F3B33B4789000');
        $this->addSql('ALTER TABLE playgroundImage DROP FOREIGN KEY FK_7B2ADEDC42738825');
        $this->addSql('ALTER TABLE openingHours DROP FOREIGN KEY FK_F07B24B9F17E51F5');
        $this->addSql('ALTER TABLE playgroundImage DROP FOREIGN KEY FK_7B2ADEDCF17E51F5');
        $this->addSql('ALTER TABLE playgroundFeature DROP FOREIGN KEY FK_697F3B33F17E51F5');
        $this->addSql('DROP TABLE feature');
        $this->addSql('DROP TABLE openingHours');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE playground');
        $this->addSql('DROP TABLE playgroundImage');
        $this->addSql('DROP TABLE playgroundFeature');
        $this->addSql('DROP TABLE playgroundsLogs');
    }
}
