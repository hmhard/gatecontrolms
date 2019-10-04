<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190917223040 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, description LONGTEXT DEFAULT NULL, report_date DATETIME NOT NULL, last_seen DATETIME NOT NULL, INDEX IDX_C42F77849D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F77849D86650F FOREIGN KEY (user_id_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE customers CHANGE registered_date registered_date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE employee CHANGE phone_no phone_no VARCHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE profile_pic profile_pic VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE report');
        $this->addSql('ALTER TABLE customers CHANGE registered_date registered_date DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE employee CHANGE phone_no phone_no VARCHAR(30) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE users CHANGE profile_pic profile_pic VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
