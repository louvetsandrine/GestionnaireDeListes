<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031140953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tasks (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, date_limited VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tasks_lists (tasks_id INT NOT NULL, lists_id INT NOT NULL, INDEX IDX_B1AAA402E3272D31 (tasks_id), INDEX IDX_B1AAA4029D26499B (lists_id), PRIMARY KEY(tasks_id, lists_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tasks_lists ADD CONSTRAINT FK_B1AAA402E3272D31 FOREIGN KEY (tasks_id) REFERENCES tasks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tasks_lists ADD CONSTRAINT FK_B1AAA4029D26499B FOREIGN KEY (lists_id) REFERENCES lists (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tasks_lists DROP FOREIGN KEY FK_B1AAA402E3272D31');
        $this->addSql('ALTER TABLE tasks_lists DROP FOREIGN KEY FK_B1AAA4029D26499B');
        $this->addSql('DROP TABLE tasks');
        $this->addSql('DROP TABLE tasks_lists');
    }
}
