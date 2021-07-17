<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210717134831 extends AbstractMigration
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
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, id_author INT DEFAULT NULL, title VARCHAR(30) NOT NULL, description VARCHAR(30) NOT NULL, year INT NOT NULL, photo VARCHAR(30) NOT NULL, cover VARCHAR(30) NOT NULL, language VARCHAR(30) NOT NULL, price DOUBLE PRECISION NOT NULL, value DOUBLE PRECISION NOT NULL, INDEX id_author (id_author), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_category (book_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_1FB30F9816A2B381 (book_id), INDEX IDX_1FB30F9812469DE2 (category_id), PRIMARY KEY(book_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, INDEX id (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ebook (id INT AUTO_INCREMENT NOT NULL, id_author INT DEFAULT NULL, user_id INT DEFAULT NULL, title VARCHAR(30) NOT NULL, description VARCHAR(30) NOT NULL, year INT NOT NULL, cover VARCHAR(30) NOT NULL, language VARCHAR(30) NOT NULL, price DOUBLE PRECISION NOT NULL, url VARCHAR(30) NOT NULL, INDEX IDX_7D51730DA76ED395 (user_id), INDEX id_author (id_author), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ebook_category (ebook_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_C902D19976E71D49 (ebook_id), INDEX IDX_C902D19912469DE2 (category_id), PRIMARY KEY(ebook_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE feature (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, description VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plan_feature (plan_id INT NOT NULL, feature_id INT NOT NULL, INDEX IDX_A1683D6EE899029B (plan_id), INDEX IDX_A1683D6E60E4B879 (feature_id), PRIMARY KEY(plan_id, feature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, plan_id INT NOT NULL, start DATETIME NOT NULL, months INT NOT NULL, amount DOUBLE PRECISION NOT NULL, status VARCHAR(30) NOT NULL, transaction VARCHAR(30) NOT NULL, INDEX IDX_A3C664D3E899029B (plan_id), INDEX id_user (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(30) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, name VARCHAR(30) NOT NULL, phone INT NOT NULL, points DOUBLE PRECISION DEFAULT NULL, is_admin TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A3319B986D25 FOREIGN KEY (id_author) REFERENCES author (id)');
        $this->addSql('ALTER TABLE book_category ADD CONSTRAINT FK_1FB30F9816A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_category ADD CONSTRAINT FK_1FB30F9812469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ebook ADD CONSTRAINT FK_7D51730D9B986D25 FOREIGN KEY (id_author) REFERENCES author (id)');
        $this->addSql('ALTER TABLE ebook ADD CONSTRAINT FK_7D51730DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ebook_category ADD CONSTRAINT FK_C902D19976E71D49 FOREIGN KEY (ebook_id) REFERENCES ebook (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ebook_category ADD CONSTRAINT FK_C902D19912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plan_feature ADD CONSTRAINT FK_A1683D6EE899029B FOREIGN KEY (plan_id) REFERENCES plan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plan_feature ADD CONSTRAINT FK_A1683D6E60E4B879 FOREIGN KEY (feature_id) REFERENCES feature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D36B3CA4B FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D3E899029B FOREIGN KEY (plan_id) REFERENCES plan (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A3319B986D25');
        $this->addSql('ALTER TABLE ebook DROP FOREIGN KEY FK_7D51730D9B986D25');
        $this->addSql('ALTER TABLE book_category DROP FOREIGN KEY FK_1FB30F9816A2B381');
        $this->addSql('ALTER TABLE book_category DROP FOREIGN KEY FK_1FB30F9812469DE2');
        $this->addSql('ALTER TABLE ebook_category DROP FOREIGN KEY FK_C902D19912469DE2');
        $this->addSql('ALTER TABLE ebook_category DROP FOREIGN KEY FK_C902D19976E71D49');
        $this->addSql('ALTER TABLE plan_feature DROP FOREIGN KEY FK_A1683D6E60E4B879');
        $this->addSql('ALTER TABLE plan_feature DROP FOREIGN KEY FK_A1683D6EE899029B');
        $this->addSql('ALTER TABLE subscription DROP FOREIGN KEY FK_A3C664D3E899029B');
        $this->addSql('ALTER TABLE ebook DROP FOREIGN KEY FK_7D51730DA76ED395');
        $this->addSql('ALTER TABLE subscription DROP FOREIGN KEY FK_A3C664D36B3CA4B');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE book_category');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE ebook');
        $this->addSql('DROP TABLE ebook_category');
        $this->addSql('DROP TABLE feature');
        $this->addSql('DROP TABLE plan');
        $this->addSql('DROP TABLE plan_feature');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE user');
    }
}
