<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220427130933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE postulation (id INT IDENTITY NOT NULL, motivation VARCHAR(MAX) NOT NULL, date_postulation DATETIME2(6) NOT NULL, IdArtiste BIGINT, IdOffreDeCasting BIGINT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_DA7D4E9BE4FDC1E ON postulation (IdArtiste)');
        $this->addSql('CREATE INDEX IDX_DA7D4E9BA09798FD ON postulation (IdOffreDeCasting)');
        $this->addSql('ALTER TABLE postulation ADD CONSTRAINT FK_DA7D4E9BE4FDC1E FOREIGN KEY (IdArtiste) REFERENCES Artiste (identifiant)');
        $this->addSql('ALTER TABLE postulation ADD CONSTRAINT FK_DA7D4E9BA09798FD FOREIGN KEY (IdOffreDeCasting) REFERENCES OffreDeCasting (identifiant)');
        $this->addSql('DROP TABLE ArtisteOffre');
        $this->addSql('ALTER TABLE Utilisateur ALTER COLUMN motDePasse NVARCHAR(50)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('CREATE TABLE ArtisteOffre (identifiantArtiste BIGINT NOT NULL, identifiantOffre BIGINT NOT NULL, PRIMARY KEY (identifiantArtiste, identifiantOffre))');
        $this->addSql('CREATE NONCLUSTERED INDEX IDX_B39B660B4E709634 ON ArtisteOffre (identifiantArtiste)');
        $this->addSql('CREATE NONCLUSTERED INDEX IDX_B39B660BE35A08E4 ON ArtisteOffre (identifiantOffre)');
        $this->addSql('ALTER TABLE ArtisteOffre ADD CONSTRAINT FK_B39B660B4E709634 FOREIGN KEY (identifiantArtiste) REFERENCES Artiste (identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ArtisteOffre ADD CONSTRAINT FK_B39B660BE35A08E4 FOREIGN KEY (identifiantOffre) REFERENCES OffredeCasting (identifiant) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE postulation');
        $this->addSql('ALTER TABLE Utilisateur ALTER COLUMN motDePasse NVARCHAR(255)');
    }
}
