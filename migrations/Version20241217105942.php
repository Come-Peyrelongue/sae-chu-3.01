<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241217105942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_187C5FCA8A49CC82');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_187C5FCA6B899279');
        $this->addSql('ALTER TABLE seance DROP séance_id, CHANGE type type VARCHAR(50) DEFAULT NULL');
        $this->addSql('DROP INDEX idx_187c5fca6b899279 ON seance');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E6B899279 ON seance (patient_id)');
        $this->addSql('DROP INDEX idx_187c5fca8a49cc82 ON seance');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E8A49CC82 ON seance (professionnel_id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_187C5FCA8A49CC82 FOREIGN KEY (professionnel_id) REFERENCES professionnel (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_187C5FCA6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E6B899279');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E8A49CC82');
        $this->addSql('ALTER TABLE seance ADD séance_id INT NOT NULL, CHANGE type type VARCHAR(100) DEFAULT NULL');
        $this->addSql('DROP INDEX idx_df7dfd0e8a49cc82 ON seance');
        $this->addSql('CREATE INDEX IDX_187C5FCA8A49CC82 ON seance (professionnel_id)');
        $this->addSql('DROP INDEX idx_df7dfd0e6b899279 ON seance');
        $this->addSql('CREATE INDEX IDX_187C5FCA6B899279 ON seance (patient_id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E8A49CC82 FOREIGN KEY (professionnel_id) REFERENCES professionnel (id)');
    }
}
