<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180806151317 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE points_description (id INT AUTO_INCREMENT NOT NULL, description_id INT NOT NULL, lang_code VARCHAR(255) NOT NULL, INDEX IDX_EC12F9B2D9F966B (description_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE point (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, coordinates VARCHAR(255) NOT NULL, image_url VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_B7A5F324727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE points_name (id INT AUTO_INCREMENT NOT NULL, fk_point_id INT NOT NULL, lang_code VARCHAR(10) NOT NULL, INDEX IDX_D05D4BC3F2008D7C (fk_point_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE points_description ADD CONSTRAINT FK_EC12F9B2D9F966B FOREIGN KEY (description_id) REFERENCES point (id)');
        $this->addSql('ALTER TABLE point ADD CONSTRAINT FK_B7A5F324727ACA70 FOREIGN KEY (parent_id) REFERENCES point (id)');
        $this->addSql('ALTER TABLE points_name ADD CONSTRAINT FK_D05D4BC3F2008D7C FOREIGN KEY (fk_point_id) REFERENCES point (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE points_description DROP FOREIGN KEY FK_EC12F9B2D9F966B');
        $this->addSql('ALTER TABLE point DROP FOREIGN KEY FK_B7A5F324727ACA70');
        $this->addSql('ALTER TABLE points_name DROP FOREIGN KEY FK_D05D4BC3F2008D7C');
        $this->addSql('DROP TABLE points_description');
        $this->addSql('DROP TABLE point');
        $this->addSql('DROP TABLE points_name');
    }
}
