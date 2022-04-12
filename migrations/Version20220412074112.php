<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412074112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT IDENTITY NOT NULL, body VARCHAR(MAX) NOT NULL, headers VARCHAR(MAX) NOT NULL, queue_name NVARCHAR(255) NOT NULL, created_at DATETIME2(6) NOT NULL, available_at DATETIME2(6) NOT NULL, delivered_at DATETIME2(6), PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('ALTER TABLE Artiste ADD roles VARCHAR(MAX) NOT NULL');
        $this->addSql('ALTER TABLE Artiste ALTER COLUMN password NVARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE Artiste ALTER COLUMN dateNaissance DATE');
        $this->addSql('ALTER TABLE Artiste ALTER COLUMN identifiantCivilite INT');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:json)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'Artiste\', N\'COLUMN\', roles');
        $this->addSql('ALTER TABLE ArtisteOffre DROP CONSTRAINT FK_Artiste');
        $this->addSql('ALTER TABLE ArtisteOffre DROP CONSTRAINT FK_Offre_de_Casting_Artiste');
        $this->addSql('ALTER TABLE ArtisteOffre ADD CONSTRAINT FK_6A6B92F74E709634 FOREIGN KEY (identifiantArtiste) REFERENCES Artiste (identifiant)');
        $this->addSql('ALTER TABLE ArtisteOffre ADD CONSTRAINT FK_6A6B92F7E35A08E4 FOREIGN KEY (identifiantOffre) REFERENCES OffredeCasting (identifiant)');
        $this->addSql('EXEC sp_rename N\'ArtisteOffre.idx_b39b660b4e709634\', N\'IDX_6A6B92F74E709634\', N\'INDEX\'');
        $this->addSql('EXEC sp_rename N\'ArtisteOffre.idx_b39b660be35a08e4\', N\'IDX_6A6B92F7E35A08E4\', N\'INDEX\'');
        $this->addSql('ALTER TABLE OffredeCasting DROP CONSTRAINT fk_Metier_Offre');
        $this->addSql('ALTER TABLE OffredeCasting DROP CONSTRAINT fk_Organisation_Offre');
        $this->addSql('ALTER TABLE OffredeCasting DROP CONSTRAINT fk_Type_Contrat_Offre');
        $this->addSql('ALTER TABLE OffredeCasting DROP COLUMN verification');
        $this->addSql('ALTER TABLE OffredeCasting ALTER COLUMN identifiantOrganisation BIGINT');
        $this->addSql('ALTER TABLE OffredeCasting ALTER COLUMN identifiantMetier BIGINT');
        $this->addSql('ALTER TABLE OffredeCasting ALTER COLUMN identifiantTypeContrat BIGINT');
        $this->addSql('ALTER TABLE OffredeCasting ADD CONSTRAINT FK_2421F0682B868BAA FOREIGN KEY (identifiantMetier) REFERENCES Metier (identifiant)');
        $this->addSql('ALTER TABLE OffredeCasting ADD CONSTRAINT FK_2421F068D58D8CC9 FOREIGN KEY (identifiantOrganisation) REFERENCES Organisation (identifiant)');
        $this->addSql('ALTER TABLE OffredeCasting ADD CONSTRAINT FK_2421F0681ACEB4D9 FOREIGN KEY (identifiantTypeContrat) REFERENCES TypeContrat (identifiant)');
        $this->addSql('ALTER TABLE PartenaireDomaine DROP CONSTRAINT FK_Partenaire_diffusion');
        $this->addSql('ALTER TABLE PartenaireDomaine DROP CONSTRAINT FK_Offre_de_Casting_Partenaire');
        $this->addSql('ALTER TABLE PartenaireDomaine ADD CONSTRAINT FK_AAE1549C21102FA5 FOREIGN KEY (identifiantPartenaire) REFERENCES PartenaireDiffusion (identifiant)');
        $this->addSql('ALTER TABLE PartenaireDomaine ADD CONSTRAINT FK_AAE1549CAAD8A9B7 FOREIGN KEY (identifiantDomaine) REFERENCES Domaine (identifiant)');
        $this->addSql('EXEC sp_rename N\'PartenaireDomaine.idx_4bff5ffa21102fa5\', N\'IDX_AAE1549C21102FA5\', N\'INDEX\'');
        $this->addSql('EXEC sp_rename N\'PartenaireDomaine.idx_4bff5ffaaad8a9b7\', N\'IDX_AAE1549CAAD8A9B7\', N\'INDEX\'');
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
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE Artiste DROP COLUMN roles');
        $this->addSql('ALTER TABLE Artiste ALTER COLUMN dateNaissance DATE NOT NULL');
        $this->addSql('ALTER TABLE Artiste ALTER COLUMN password NVARCHAR(100)');
        $this->addSql('ALTER TABLE Artiste ALTER COLUMN identifiantCivilite INT NOT NULL');
        $this->addSql('ALTER TABLE artisteoffre DROP CONSTRAINT FK_6A6B92F74E709634');
        $this->addSql('ALTER TABLE artisteoffre DROP CONSTRAINT FK_6A6B92F7E35A08E4');
        $this->addSql('ALTER TABLE artisteoffre ADD CONSTRAINT FK_Artiste FOREIGN KEY (identifiantArtiste) REFERENCES Artiste (identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artisteoffre ADD CONSTRAINT FK_Offre_de_Casting_Artiste FOREIGN KEY (identifiantOffre) REFERENCES OffredeCasting (identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('EXEC sp_rename N\'artisteoffre.idx_6a6b92f74e709634\', N\'IDX_B39B660B4E709634\', N\'INDEX\'');
        $this->addSql('EXEC sp_rename N\'artisteoffre.idx_6a6b92f7e35a08e4\', N\'IDX_B39B660BE35A08E4\', N\'INDEX\'');
        $this->addSql('ALTER TABLE OffredeCasting DROP CONSTRAINT FK_2421F0682B868BAA');
        $this->addSql('ALTER TABLE OffredeCasting DROP CONSTRAINT FK_2421F068D58D8CC9');
        $this->addSql('ALTER TABLE OffredeCasting DROP CONSTRAINT FK_2421F0681ACEB4D9');
        $this->addSql('ALTER TABLE OffredeCasting ADD verification BIT NOT NULL');
        $this->addSql('ALTER TABLE OffredeCasting ALTER COLUMN identifiantMetier BIGINT NOT NULL');
        $this->addSql('ALTER TABLE OffredeCasting ALTER COLUMN identifiantOrganisation BIGINT NOT NULL');
        $this->addSql('ALTER TABLE OffredeCasting ALTER COLUMN identifiantTypeContrat BIGINT NOT NULL');
        $this->addSql('ALTER TABLE OffredeCasting ADD CONSTRAINT fk_Metier_Offre FOREIGN KEY (identifiantMetier) REFERENCES Metier (identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE OffredeCasting ADD CONSTRAINT fk_Organisation_Offre FOREIGN KEY (identifiantOrganisation) REFERENCES Organisation (identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE OffredeCasting ADD CONSTRAINT fk_Type_Contrat_Offre FOREIGN KEY (identifiantTypeContrat) REFERENCES TypeContrat (identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partenairedomaine DROP CONSTRAINT FK_AAE1549C21102FA5');
        $this->addSql('ALTER TABLE partenairedomaine DROP CONSTRAINT FK_AAE1549CAAD8A9B7');
        $this->addSql('ALTER TABLE partenairedomaine ADD CONSTRAINT FK_Partenaire_diffusion FOREIGN KEY (identifiantPartenaire) REFERENCES Partenairediffusion (identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partenairedomaine ADD CONSTRAINT FK_Offre_de_Casting_Partenaire FOREIGN KEY (identifiantDomaine) REFERENCES Domaine (identifiant) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('EXEC sp_rename N\'partenairedomaine.idx_aae1549c21102fa5\', N\'IDX_4BFF5FFA21102FA5\', N\'INDEX\'');
        $this->addSql('EXEC sp_rename N\'partenairedomaine.idx_aae1549caad8a9b7\', N\'IDX_4BFF5FFAAAD8A9B7\', N\'INDEX\'');
    }
}
