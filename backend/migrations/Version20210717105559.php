<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210717105559 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, points DOUBLE PRECISION NOT NULL, picture VARCHAR(30) DEFAULT NULL, country VARCHAR(30) DEFAULT NULL, INDEX id (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, id_category INT DEFAULT NULL, id_author INT DEFAULT NULL, title VARCHAR(30) NOT NULL, description VARCHAR(30) NOT NULL, year INT NOT NULL, photo VARCHAR(30) NOT NULL, cover VARCHAR(30) NOT NULL, language VARCHAR(30) NOT NULL, price DOUBLE PRECISION NOT NULL, value DOUBLE PRECISION NOT NULL, INDEX id_category (id_category), INDEX id_author (id_author), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, INDEX id (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eBook (id INT AUTO_INCREMENT NOT NULL, id_category INT DEFAULT NULL, id_author INT DEFAULT NULL, title VARCHAR(30) NOT NULL, description VARCHAR(30) NOT NULL, year INT NOT NULL, cover VARCHAR(30) NOT NULL, language VARCHAR(30) NOT NULL, price DOUBLE PRECISION NOT NULL, url VARCHAR(30) NOT NULL, INDEX id_category (id_category), INDEX id_author (id_author), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE feature (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inovice (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(30) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, status VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, start DATETIME NOT NULL, months INT NOT NULL, amount DOUBLE PRECISION NOT NULL, status VARCHAR(30) NOT NULL, transaction VARCHAR(30) NOT NULL, INDEX id_user (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(30) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, name VARCHAR(30) NOT NULL, phone INT NOT NULL, points DOUBLE PRECISION DEFAULT NULL, is_admin TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adders (id_user INT NOT NULL, id_book INT NOT NULL, INDEX IDX_3085FEBC6B3CA4B (id_user), INDEX IDX_3085FEBC40C5BF33 (id_book), PRIMARY KEY(id_user, id_book)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE owners (id_user INT NOT NULL, id_book INT NOT NULL, INDEX IDX_427292FA6B3CA4B (id_user), INDEX IDX_427292FA40C5BF33 (id_book), PRIMARY KEY(id_user, id_book)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id_user INT NOT NULL, id_book INT NOT NULL, INDEX IDX_E52FFDEE6B3CA4B (id_user), INDEX IDX_E52FFDEE40C5BF33 (id_book), PRIMARY KEY(id_user, id_book)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3315697F554 FOREIGN KEY (id_category) REFERENCES category (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3319B986D25 FOREIGN KEY (id_author) REFERENCES author (id)');
        $this->addSql('ALTER TABLE eBook ADD CONSTRAINT FK_DD63DC335697F554 FOREIGN KEY (id_category) REFERENCES category (id)');
        $this->addSql('ALTER TABLE eBook ADD CONSTRAINT FK_DD63DC339B986D25 FOREIGN KEY (id_author) REFERENCES author (id)');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D36B3CA4B FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE adders ADD CONSTRAINT FK_3085FEBC6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE adders ADD CONSTRAINT FK_3085FEBC40C5BF33 FOREIGN KEY (id_book) REFERENCES book (id)');
        $this->addSql('ALTER TABLE owners ADD CONSTRAINT FK_427292FA6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE owners ADD CONSTRAINT FK_427292FA40C5BF33 FOREIGN KEY (id_book) REFERENCES book (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE40C5BF33 FOREIGN KEY (id_book) REFERENCES book (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3319B986D25');
        $this->addSql('ALTER TABLE eBook DROP FOREIGN KEY FK_DD63DC339B986D25');
        $this->addSql('ALTER TABLE adders DROP FOREIGN KEY FK_3085FEBC40C5BF33');
        $this->addSql('ALTER TABLE owners DROP FOREIGN KEY FK_427292FA40C5BF33');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE40C5BF33');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3315697F554');
        $this->addSql('ALTER TABLE eBook DROP FOREIGN KEY FK_DD63DC335697F554');
        $this->addSql('ALTER TABLE subscription DROP FOREIGN KEY FK_A3C664D36B3CA4B');
        $this->addSql('ALTER TABLE adders DROP FOREIGN KEY FK_3085FEBC6B3CA4B');
        $this->addSql('ALTER TABLE owners DROP FOREIGN KEY FK_427292FA6B3CA4B');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE6B3CA4B');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE eBook');
        $this->addSql('DROP TABLE feature');
        $this->addSql('DROP TABLE inovice');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE plan');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE adders');
        $this->addSql('DROP TABLE owners');
        $this->addSql('DROP TABLE orders');
    }
}
