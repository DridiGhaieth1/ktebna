<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210717102010 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book DROP FOREIGN KEY book_ibfk_1');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY book_ibfk_2');
        $this->addSql('DROP INDEX id_owner ON book');
        $this->addSql('DROP INDEX id_adder ON book');
        $this->addSql('ALTER TABLE book DROP id_adder, DROP id_owner');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book ADD id_adder INT DEFAULT NULL, ADD id_owner INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT book_ibfk_1 FOREIGN KEY (id_adder) REFERENCES user (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT book_ibfk_2 FOREIGN KEY (id_owner) REFERENCES user (id)');
        $this->addSql('CREATE INDEX id_owner ON book (id_owner)');
        $this->addSql('CREATE INDEX id_adder ON book (id_adder)');
    }
}
