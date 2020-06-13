<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Class Version20200612183738
 *
 * @package DoctrineMigrations
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
final class Version20200612183138 extends AbstractMigration
{
    /**
     * @return string
     */
    public function getDescription(): string
    {
        return 'Migration responsible for creating the "review" table.';
    }

    /**
     * @param Schema $schema
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(
            'CREATE TABLE hotel (
                    id BINARY(16) PRIMARY KEY NOT NULL,
                    company_id BINARY(16) NOT NULL, 
                    name VARCHAR(50) NOT NULL, 
                    address VARCHAR(255) DEFAULT NULL,
                    FOREIGN KEY (company_id) REFERENCES company(id)
                )'
        );
    }

    /**
     * @param Schema $schema
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE hotel');
    }
}
