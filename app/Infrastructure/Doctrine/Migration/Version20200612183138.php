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
     */
    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE hotel (
                    id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
                    name VARCHAR(50) NOT NULL, 
                    address VARCHAR(255) DEFAULT NULL
                    )'
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE hotel');
    }
}
