<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221212175432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, detail VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (idCmd INT NOT NULL, idPanier INT NOT NULL, idProd INT NOT NULL, nomProd VARCHAR(255) NOT NULL, quantite INT NOT NULL, prixProd DOUBLE PRECISION NOT NULL, prixRemise DOUBLE PRECISION NOT NULL, etatCmd VARCHAR(255) NOT NULL, dateCmd VARCHAR(255) NOT NULL, PRIMARY KEY(idCmd, idProd, dateCmd)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandpm (idCPM INT AUTO_INCREMENT NOT NULL, IDProd INT DEFAULT NULL, NomProd VARCHAR(255) DEFAULT NULL, referenceCM INT DEFAULT NULL, date VARCHAR(255) DEFAULT NULL, quantiteCpm VARCHAR(255) DEFAULT NULL, iduser INT DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(idCPM)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (idEvent INT AUTO_INCREMENT NOT NULL, NomEvent VARCHAR(20) DEFAULT NULL, AdresseEvent VARCHAR(20) DEFAULT NULL, CapaciteEvent INT DEFAULT NULL, nbrTicketAchete INT DEFAULT NULL, DateDebutEvent DATETIME DEFAULT NULL, DateFinEvent DATETIME DEFAULT NULL, TypeEvent VARCHAR(20) DEFAULT NULL, CategorieEvent VARCHAR(20) DEFAULT NULL, PrixEntre DOUBLE PRECISION DEFAULT NULL, image1 VARCHAR(500) DEFAULT NULL, PRIMARY KEY(idEvent)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_calendar (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, start DATETIME NOT NULL, end DATETIME NOT NULL, description LONGTEXT NOT NULL, background_color VARCHAR(10) NOT NULL, border_color VARCHAR(10) NOT NULL, text_color VARCHAR(10) NOT NULL, journee_entiere TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (idFacture INT AUTO_INCREMENT NOT NULL, idCmd INT NOT NULL, idUser INT NOT NULL, montant DOUBLE PRECISION NOT NULL, dateCmd VARCHAR(255) NOT NULL, PRIMARY KEY(idFacture)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historiquevente (IdVent INT AUTO_INCREMENT NOT NULL, DateVent VARCHAR(255) DEFAULT NULL, QteVendue DOUBLE PRECISION DEFAULT NULL, PrixVente DOUBLE PRECISION DEFAULT NULL, IdPROD INT DEFAULT NULL, PRIMARY KEY(IdVent)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `like` (Id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, produit INT NOT NULL, iduser INT NOT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (idPanier INT NOT NULL, idProd INT NOT NULL, nomProd VARCHAR(255) NOT NULL, quantite INT NOT NULL, prixProd DOUBLE PRECISION NOT NULL, prixRemise DOUBLE PRECISION NOT NULL, PRIMARY KEY(idPanier, idProd)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (IdPROD INT AUTO_INCREMENT NOT NULL, NomProd VARCHAR(255) NOT NULL, PrixProd DOUBLE PRECISION NOT NULL, LocalisationProd VARCHAR(255) NOT NULL, TypeProd VARCHAR(255) NOT NULL, TypeStatue VARCHAR(255) NOT NULL, imagem1 VARCHAR(500) NOT NULL, rating VARCHAR(255) DEFAULT NULL, PRIMARY KEY(IdPROD)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produitpm (IDProd INT AUTO_INCREMENT NOT NULL, NomProd VARCHAR(255) DEFAULT NULL, referenceP INT DEFAULT NULL, quantiteP INT DEFAULT NULL, typep VARCHAR(255) DEFAULT NULL, prixPM INT DEFAULT NULL, QRcode VARCHAR(255) DEFAULT NULL, dateAjoutPM VARCHAR(255) DEFAULT NULL, PRIMARY KEY(IDProd)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, iduser INT NOT NULL, description VARCHAR(255) NOT NULL, recdate VARCHAR(255) NOT NULL, selon VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE res (id_res INT AUTO_INCREMENT NOT NULL, nom_artiste VARCHAR(255) NOT NULL, date_res VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, salle_id INT NOT NULL, PRIMARY KEY(id_res)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, statu VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, capacite INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (IdTicket INT AUTO_INCREMENT NOT NULL, PrixTicket DOUBLE PRECISION DEFAULT NULL, NomEvent VARCHAR(20) DEFAULT NULL, TypeTicket VARCHAR(10) DEFAULT NULL, PRIMARY KEY(IdTicket)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, tel VARCHAR(10) NOT NULL, reset_token VARCHAR(100) DEFAULT NULL, status VARCHAR(10) DEFAULT \'Actif\' NOT NULL, city VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D64912469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D64912469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64912469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commandpm');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE event_calendar');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE historiquevente');
        $this->addSql('DROP TABLE `like`');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produitpm');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE res');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
