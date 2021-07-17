<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210716200436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, name TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, points DOUBLE PRECISION NOT NULL, picture TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, country TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, INDEX id (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, id_adder INT DEFAULT NULL, id_owner INT DEFAULT NULL, id_author INT NOT NULL, id_category INT NOT NULL, title TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, description TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, year INT NOT NULL, photo TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, cover TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, language TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, price DOUBLE PRECISION NOT NULL, value DOUBLE PRECISION NOT NULL, INDEX id_owner (id_owner), INDEX id_category (id_category), INDEX id_adder (id_adder), INDEX id_author (id_author), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, INDEX id (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE eBook (id INT AUTO_INCREMENT NOT NULL, id_author INT NOT NULL, id_category INT NOT NULL, title TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, description TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, year INT NOT NULL, cover TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, language TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, price DOUBLE PRECISION NOT NULL, url TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, INDEX id_category (id_category), INDEX id_author (id_author), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE feature (id INT AUTO_INCREMENT NOT NULL, name TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, description TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE inovice (id INT AUTO_INCREMENT NOT NULL, status TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE orderr (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, status TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE plan (id INT AUTO_INCREMENT NOT NULL, name TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, start DATETIME NOT NULL, months INT NOT NULL, amount DOUBLE PRECISION NOT NULL, status TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, transaction TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, INDEX id_user (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT book_ibfk_1 FOREIGN KEY (id_adder) REFERENCES user (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT book_ibfk_2 FOREIGN KEY (id_owner) REFERENCES user (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT book_ibfk_3 FOREIGN KEY (id_category) REFERENCES category (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT book_ibfk_4 FOREIGN KEY (id_author) REFERENCES author (id)');
        $this->addSql('ALTER TABLE eBook ADD CONSTRAINT ebook_ibfk_1 FOREIGN KEY (id_category) REFERENCES category (id)');
        $this->addSql('ALTER TABLE eBook ADD CONSTRAINT ebook_ibfk_2 FOREIGN KEY (id_author) REFERENCES author (id)');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT subscription_ibfk_1 FOREIGN KEY (id_user) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY book_ibfk_4');
        $this->addSql('ALTER TABLE eBook DROP FOREIGN KEY ebook_ibfk_2');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY book_ibfk_3');
        $this->addSql('ALTER TABLE eBook DROP FOREIGN KEY ebook_ibfk_1');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE eBook');
        $this->addSql('DROP TABLE feature');
        $this->addSql('DROP TABLE inovice');
        $this->addSql('DROP TABLE orderr');
        $this->addSql('DROP TABLE plan');
        $this->addSql('DROP TABLE subscription');
    }
}
