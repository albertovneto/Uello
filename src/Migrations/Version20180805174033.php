<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180805174033 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045592113199');
        $this->addSql('DROP INDEX IDX_C744045592113199 ON client');
        $this->addSql('ALTER TABLE client CHANGE import_id_id import_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455B6A263D9 FOREIGN KEY (import_id) REFERENCES import (id)');
        $this->addSql('CREATE INDEX IDX_C7440455B6A263D9 ON client (import_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455B6A263D9');
        $this->addSql('DROP INDEX IDX_C7440455B6A263D9 ON client');
        $this->addSql('ALTER TABLE client CHANGE import_id import_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045592113199 FOREIGN KEY (import_id_id) REFERENCES import (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C744045592113199 ON client (import_id_id)');
    }
}
