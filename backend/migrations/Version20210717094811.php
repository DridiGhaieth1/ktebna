<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210717094811 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE author CHANGE name name VARCHAR(30) NOT NULL, CHANGE picture picture VARCHAR(30) DEFAULT NULL, CHANGE country country VARCHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE book CHANGE id_author id_author INT DEFAULT NULL, CHANGE id_category id_category INT DEFAULT NULL, CHANGE title title VARCHAR(30) NOT NULL, CHANGE description description VARCHAR(30) NOT NULL, CHANGE photo photo VARCHAR(30) NOT NULL, CHANGE cover cover VARCHAR(30) NOT NULL, CHANGE language language VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE eBook CHANGE id_author id_author INT DEFAULT NULL, CHANGE id_category id_category INT DEFAULT NULL, CHANGE title title VARCHAR(30) NOT NULL, CHANGE description description VARCHAR(30) NOT NULL, CHANGE cover cover VARCHAR(30) NOT NULL, CHANGE language language VARCHAR(30) NOT NULL, CHANGE url url VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE feature CHANGE name name VARCHAR(30) NOT NULL, CHANGE description description VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE inovice CHANGE status status VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE order CHANGE status status VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE plan CHANGE name name VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE subscription CHANGE id_user id_user INT DEFAULT NULL, CHANGE status status VARCHAR(30) NOT NULL, CHANGE transaction transaction VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(30) NOT NULL, CHANGE name name VARCHAR(30) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE author CHANGE name name TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE picture picture TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE country country TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE book CHANGE id_category id_category INT NOT NULL, CHANGE id_author id_author INT NOT NULL, CHANGE title title TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE description description TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE photo photo TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE cover cover TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE language language TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE category CHANGE name name TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE eBook CHANGE id_category id_category INT NOT NULL, CHANGE id_author id_author INT NOT NULL, CHANGE title title TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE description description TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE cover cover TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE language language TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE url url TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE feature CHANGE name name TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE description description TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE inovice CHANGE status status TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE order CHANGE status status TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE plan CHANGE name name TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE subscription CHANGE id_user id_user INT NOT NULL, CHANGE status status TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE transaction transaction TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
