<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412081425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Artiste (identifiant BIGINT IDENTITY NOT NULL, nom NVARCHAR(100) NOT NULL, prenom NVARCHAR(100) NOT NULL, cv NVARCHAR(100), pseudo NVARCHAR(100), dateNaissance DATE, verification BIT NOT NULL, roles VARCHAR(MAX) NOT NULL, password NVARCHAR(255) NOT NULL, identifiantCivilite INT NOT NULL, PRIMARY KEY (identifiant))');
        $this->addSql('CREATE INDEX IDX_53BA0CD3EB49C4C1 ON Artiste (identifiantCivilite)');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:json)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'Artiste\', N\'COLUMN\', roles');
        $this->addSql('CREATE TABLE ArtisteOffre (identifiantArtiste BIGINT NOT NULL, identifiantOffre BIGINT NOT NULL, PRIMARY KEY (identifiantArtiste, identifiantOffre))');
        $this->addSql('CREATE INDEX IDX_B39B660B4E709634 ON ArtisteOffre (identifiantArtiste)');
        $this->addSql('CREATE INDEX IDX_B39B660BE35A08E4 ON ArtisteOffre (identifiantOffre)');
        $this->addSql('CREATE TABLE Civilite (identifiant INT IDENTITY NOT NULL, nom NVARCHAR(100) NOT NULL, nomCourt NVARCHAR(10) NOT NULL, PRIMARY KEY (identifiant))');
        $this->addSql('CREATE TABLE ContenuEditorial (identifiant BIGINT IDENTITY NOT NULL, ficheMetier NVARCHAR(100) NOT NULL, conseil NVARCHAR(100) NOT NULL, interviews NVARCHAR(100) NOT NULL, article VARCHAR(MAX) NOT NULL, PRIMARY KEY (identifiant))');
        $this->addSql('CREATE TABLE Domaine (identifiant BIGINT IDENTITY NOT NULL, nom NVARCHAR(255) NOT NULL, PRIMARY KEY (identifiant))');
        $this->addSql('CREATE TABLE Metier (identifiant BIGINT IDENTITY NOT NULL, nom NVARCHAR(255) NOT NULL, identifiantDomaine BIGINT, PRIMARY KEY (identifiant))');
        $this->addSql('CREATE INDEX IDX_560C08BAAAD8A9B7 ON Metier (identifiantDomaine)');
        $this->addSql('CREATE TABLE OffredeCasting (identifiant BIGINT IDENTITY NOT NULL, nom NVARCHAR(255) NOT NULL, reference NVARCHAR(255) NOT NULL, dateDebut DATE NOT NULL, dateFin DATE NOT NULL, ville NVARCHAR(100) NOT NULL, identifiantMetier BIGINT NOT NULL, identifiantOrganisation BIGINT NOT NULL, identifiantTypeContrat BIGINT NOT NULL, PRIMARY KEY (identifiant))');
        $this->addSql('CREATE INDEX IDX_2421F0682B868BAA ON OffredeCasting (identifiantMetier)');
        $this->addSql('CREATE INDEX IDX_2421F068D58D8CC9 ON OffredeCasting (identifiantOrganisation)');
        $this->addSql('CREATE INDEX IDX_2421F0681ACEB4D9 ON OffredeCasting (identifiantTypeContrat)');
        $this->addSql('CREATE TABLE Organisation (identifiant BIGINT IDENTITY NOT NULL, nom NVARCHAR(100), adresse NVARCHAR(100), codePostal INT NOT NULL, numeroTelephone INT NOT NULL, adresseEmail NVARCHAR(100), PRIMARY KEY (identifiant))');
        $this->addSql('CREATE TABLE PartenaireDiffusion (identifiant BIGINT IDENTITY NOT NULL, nomDomaine NVARCHAR(100), libelleMedia NVARCHAR(100) NOT NULL, acces BIT NOT NULL, PRIMARY KEY (identifiant))');
        $this->addSql('ALTER TABLE PartenaireDiffusion ADD CONSTRAINT DF_CB254605_D0F43B10 DEFAULT 1 FOR acces');
        $this->addSql('CREATE TABLE PartenaireDomaine (identifiantPartenaire BIGINT NOT NULL, identifiantDomaine BIGINT NOT NULL, PRIMARY KEY (identifiantPartenaire, identifiantDomaine))');
        $this->addSql('CREATE INDEX IDX_4BFF5FFA21102FA5 ON PartenaireDomaine (identifiantPartenaire)');
        $this->addSql('CREATE INDEX IDX_4BFF5FFAAAD8A9B7 ON PartenaireDomaine (identifiantDomaine)');
        $this->addSql('CREATE TABLE TypeContrat (identifiant BIGINT IDENTITY NOT NULL, nomContrat NVARCHAR(50) NOT NULL, PRIMARY KEY (identifiant))');
        $this->addSql('CREATE TABLE Utilisateur (identifiant BIGINT IDENTITY NOT NULL, nom NVARCHAR(100) NOT NULL, motDePasse NVARCHAR(50), acces BIT NOT NULL, dateAjout DATE NOT NULL, PRIMARY KEY (identifiant))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT IDENTITY NOT NULL, body VARCHAR(MAX) NOT NULL, headers VARCHAR(MAX) NOT NULL, queue_name NVARCHAR(255) NOT NULL, created_at DATETIME2(6) NOT NULL, available_at DATETIME2(6) NOT NULL, delivered_at DATETIME2(6), PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('ALTER TABLE Artiste ADD CONSTRAINT FK_53BA0CD3EB49C4C1 FOREIGN KEY (identifiantCivilite) REFERENCES Civilite (identifiant)');
        $this->addSql('ALTER TABLE ArtisteOffre ADD CONSTRAINT FK_B39B660B4E709634 FOREIGN KEY (identifiantArtiste) REFERENCES Artiste (identifiant)');
        $this->addSql('ALTER TABLE ArtisteOffre ADD CONSTRAINT FK_B39B660BE35A08E4 FOREIGN KEY (identifiantOffre) REFERENCES OffredeCasting (identifiant)');
        $this->addSql('ALTER TABLE Metier ADD CONSTRAINT FK_560C08BAAAD8A9B7 FOREIGN KEY (identifiantDomaine) REFERENCES Domaine (identifiant)');
        $this->addSql('ALTER TABLE OffredeCasting ADD CONSTRAINT FK_2421F0682B868BAA FOREIGN KEY (identifiantMetier) REFERENCES Metier (identifiant)');
        $this->addSql('ALTER TABLE OffredeCasting ADD CONSTRAINT FK_2421F068D58D8CC9 FOREIGN KEY (identifiantOrganisation) REFERENCES Organisation (identifiant)');
        $this->addSql('ALTER TABLE OffredeCasting ADD CONSTRAINT FK_2421F0681ACEB4D9 FOREIGN KEY (identifiantTypeContrat) REFERENCES TypeContrat (identifiant)');
        $this->addSql('ALTER TABLE PartenaireDomaine ADD CONSTRAINT FK_4BFF5FFA21102FA5 FOREIGN KEY (identifiantPartenaire) REFERENCES PartenaireDiffusion (identifiant)');
        $this->addSql('ALTER TABLE PartenaireDomaine ADD CONSTRAINT FK_4BFF5FFAAAD8A9B7 FOREIGN KEY (identifiantDomaine) REFERENCES Domaine (identifiant)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ArtisteOffre DROP CONSTRAINT FK_B39B660B4E709634');
        $this->addSql('ALTER TABLE Artiste DROP CONSTRAINT FK_53BA0CD3EB49C4C1');
        $this->addSql('ALTER TABLE Metier DROP CONSTRAINT FK_560C08BAAAD8A9B7');
        $this->addSql('ALTER TABLE PartenaireDomaine DROP CONSTRAINT FK_4BFF5FFAAAD8A9B7');
        $this->addSql('ALTER TABLE OffredeCasting DROP CONSTRAINT FK_2421F0682B868BAA');
        $this->addSql('ALTER TABLE ArtisteOffre DROP CONSTRAINT FK_B39B660BE35A08E4');
        $this->addSql('ALTER TABLE OffredeCasting DROP CONSTRAINT FK_2421F068D58D8CC9');
        $this->addSql('ALTER TABLE PartenaireDomaine DROP CONSTRAINT FK_4BFF5FFA21102FA5');
        $this->addSql('ALTER TABLE OffredeCasting DROP CONSTRAINT FK_2421F0681ACEB4D9');
        $this->addSql('DROP TABLE Artiste');
        $this->addSql('DROP TABLE ArtisteOffre');
        $this->addSql('DROP TABLE Civilite');
        $this->addSql('DROP TABLE ContenuEditorial');
        $this->addSql('DROP TABLE Domaine');
        $this->addSql('DROP TABLE Metier');
        $this->addSql('DROP TABLE OffredeCasting');
        $this->addSql('DROP TABLE Organisation');
        $this->addSql('DROP TABLE PartenaireDiffusion');
        $this->addSql('DROP TABLE PartenaireDomaine');
        $this->addSql('DROP TABLE TypeContrat');
        $this->addSql('DROP TABLE Utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
