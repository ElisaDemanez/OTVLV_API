<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180830100409 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE points_description');
        $this->addSql('ALTER TABLE point DROP FOREIGN KEY FK_B7A5F324727ACA70');
        $this->addSql('DROP INDEX IDX_B7A5F324727ACA70 ON point');
        $this->addSql('ALTER TABLE point DROP parent_id, DROP image_url, DROP latitude, DROP longitude');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE points_description (id INT AUTO_INCREMENT NOT NULL, fk_point_id INT NOT NULL, lang_code VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, description VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_EC12F9B2F2008D7C (fk_point_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE points_description ADD CONSTRAINT FK_EC12F9B2F2008D7C FOREIGN KEY (fk_point_id) REFERENCES point (id)');
        $this->addSql('ALTER TABLE point ADD parent_id INT DEFAULT NULL, ADD image_url VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD latitude DOUBLE PRECISION NOT NULL, ADD longitude DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE point ADD CONSTRAINT FK_B7A5F324727ACA70 FOREIGN KEY (parent_id) REFERENCES point (id)');
        $this->addSql('CREATE INDEX IDX_B7A5F324727ACA70 ON point (parent_id)');
    }
}
