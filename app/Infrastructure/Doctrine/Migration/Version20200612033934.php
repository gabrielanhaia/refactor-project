<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Class Version20200613133934
 *
 * @package DoctrineMigrations
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
final class Version20200612033934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the table company.';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(
            $this->connection
                ->getDatabasePlatform()
                ->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql(
            'CREATE TABLE company (
                    id BINARY(16) PRIMARY KEY NOT NULL,
                    name VARCHAR(50) NOT NULL
                )'
        );
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(
            $this->connection
                ->getDatabasePlatform()
                ->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql('DROP TABLE company');
    }
}
