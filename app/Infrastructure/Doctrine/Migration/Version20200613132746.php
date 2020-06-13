<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Class Version20200613132746
 *
 * @package DoctrineMigrations
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
final class Version20200613132746 extends AbstractMigration
{
    /**
     * @return string
     */
    public function getDescription() : string
    {
        return 'Add comments to describe the UUID fields in the database.';
    }

    /**
     * @param Schema $schema
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hotel CHANGE id id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\'');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY review_ibfk_1');
        $this->addSql('DROP INDEX hotel_id ON review');
        $this->addSql('ALTER TABLE review CHANGE id id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\', CHANGE hotel_id hotel_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid_binary)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hotel CHANGE id id BINARY(16) NOT NULL');
        $this->addSql('ALTER TABLE review CHANGE id id BINARY(16) NOT NULL, CHANGE hotel_id hotel_id BINARY(16) NOT NULL');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT review_ibfk_1 FOREIGN KEY (hotel_id) REFERENCES hotel (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX hotel_id ON review (hotel_id)');
    }
}
