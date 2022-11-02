<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221102150856 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tasks_lists DROP FOREIGN KEY FK_B1AAA4029D26499B');
        $this->addSql('ALTER TABLE tasks_lists DROP FOREIGN KEY FK_B1AAA402E3272D31');
        $this->addSql('DROP TABLE tasks_lists');
        $this->addSql('ALTER TABLE tasks ADD list_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tasks ADD CONSTRAINT FK_505865973DAE168B FOREIGN KEY (list_id) REFERENCES lists (id)');
        $this->addSql('CREATE INDEX IDX_505865973DAE168B ON tasks (list_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tasks_lists (tasks_id INT NOT NULL, lists_id INT NOT NULL, INDEX IDX_B1AAA402E3272D31 (tasks_id), INDEX IDX_B1AAA4029D26499B (lists_id), PRIMARY KEY(tasks_id, lists_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE tasks_lists ADD CONSTRAINT FK_B1AAA4029D26499B FOREIGN KEY (lists_id) REFERENCES lists (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tasks_lists ADD CONSTRAINT FK_B1AAA402E3272D31 FOREIGN KEY (tasks_id) REFERENCES tasks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tasks DROP FOREIGN KEY FK_505865973DAE168B');
        $this->addSql('DROP INDEX IDX_505865973DAE168B ON tasks');
        $this->addSql('ALTER TABLE tasks DROP list_id');
    }
}
