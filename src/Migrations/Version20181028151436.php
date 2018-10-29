<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181028151436 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE datavalue ADD gamedata_id INT DEFAULT NULL, ADD datatype_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE datavalue ADD CONSTRAINT FK_FB1DE3CDB3F3EB77 FOREIGN KEY (gamedata_id) REFERENCES gamedata (id)');
        $this->addSql('CREATE INDEX IDX_FB1DE3CDB3F3EB77 ON datavalue (gamedata_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE datavalue DROP FOREIGN KEY FK_FB1DE3CDB3F3EB77');
        $this->addSql('DROP INDEX IDX_FB1DE3CDB3F3EB77 ON datavalue');
        $this->addSql('ALTER TABLE datavalue DROP gamedata_id, DROP datatype_id');
    }
}
