<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180806200328 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE points_description DROP FOREIGN KEY FK_EC12F9B2D9F966B');
        $this->addSql('DROP INDEX IDX_EC12F9B2D9F966B ON points_description');
        $this->addSql('ALTER TABLE points_description CHANGE description_id fk_point_id INT NOT NULL');
        $this->addSql('ALTER TABLE points_description ADD CONSTRAINT FK_EC12F9B2F2008D7C FOREIGN KEY (fk_point_id) REFERENCES point (id)');
        $this->addSql('CREATE INDEX IDX_EC12F9B2F2008D7C ON points_description (fk_point_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE points_description DROP FOREIGN KEY FK_EC12F9B2F2008D7C');
        $this->addSql('DROP INDEX IDX_EC12F9B2F2008D7C ON points_description');
        $this->addSql('ALTER TABLE points_description CHANGE fk_point_id description_id INT NOT NULL');
        $this->addSql('ALTER TABLE points_description ADD CONSTRAINT FK_EC12F9B2D9F966B FOREIGN KEY (description_id) REFERENCES point (id)');
        $this->addSql('CREATE INDEX IDX_EC12F9B2D9F966B ON points_description (description_id)');
    }
}
