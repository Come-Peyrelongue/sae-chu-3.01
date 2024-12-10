<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241204094046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance ADD patient_id INT DEFAULT NULL, ADD professionnel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_187C5FCA6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_187C5FCA8A49CC82 FOREIGN KEY (professionnel_id) REFERENCES professionnel (id)');
        $this->addSql('CREATE INDEX IDX_187C5FCA6B899279 ON seance (patient_id)');
        $this->addSql('CREATE INDEX IDX_187C5FCA8A49CC82 ON seance (professionnel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_187C5FCA6B899279');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_187C5FCA8A49CC82');
        $this->addSql('DROP INDEX IDX_187C5FCA6B899279 ON seance');
        $this->addSql('DROP INDEX IDX_187C5FCA8A49CC82 ON seance');
        $this->addSql('ALTER TABLE seance DROP patient_id, DROP professionnel_id');
    }
}
