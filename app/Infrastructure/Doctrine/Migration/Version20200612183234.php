<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Migration responsible for creating the table hotel.
 *
 * @package DoctrineMigrations
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
final class Version20200612183234 extends AbstractMigration
{
    /**
     * @return string
     */
    public function getDescription(): string
    {
        return 'Migration responsible for creating the "hotel" table.';
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE review (
                        id BINARY(16) PRIMARY KEY NOT NULL, 
                        hotel_id BINARY(16) NOT NULL, 
                        score INTEGER NOT NULL, 
                        comment VARCHAR(255) DEFAULT NULL,
                        FOREIGN KEY (hotel_id) REFERENCES hotel(id)
                )'
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE review');
    }
}
