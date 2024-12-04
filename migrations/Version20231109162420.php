<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231109162420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE diem (id INT AUTO_INCREMENT NOT NULL, ten_hk_id INT DEFAULT NULL, ten_mon_hoc_id INT DEFAULT NULL, ten_hs_id INT DEFAULT NULL, diem_tra_bai DOUBLE PRECISION NOT NULL, diem_ktra15phut DOUBLE PRECISION NOT NULL, diem_ktra1tiet DOUBLE PRECISION NOT NULL, diem_thi DOUBLE PRECISION NOT NULL, diem_tb DOUBLE PRECISION NOT NULL, INDEX IDX_F98FCDE02979F59E (ten_hk_id), INDEX IDX_F98FCDE0E3E87926 (ten_mon_hoc_id), INDEX IDX_F98FCDE0BCD48AEE (ten_hs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hoc_ky (id INT AUTO_INCREMENT NOT NULL, ten_hk VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hoc_sinh (id INT AUTO_INCREMENT NOT NULL, ten_lop_id INT DEFAULT NULL, ten_hs VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL, sdt VARCHAR(20) NOT NULL, dia_chi VARCHAR(30) NOT NULL, ten_phu_huynh VARCHAR(30) NOT NULL, sdtph VARCHAR(20) NOT NULL, INDEX IDX_A96A2D1B8C4B31AB (ten_lop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lich_hoc (id INT AUTO_INCREMENT NOT NULL, ten_mon_hoc_id INT DEFAULT NULL, ten_lop_id INT DEFAULT NULL, so_tiet INT NOT NULL, ngay DATE NOT NULL, INDEX IDX_381EE035E3E87926 (ten_mon_hoc_id), INDEX IDX_381EE0358C4B31AB (ten_lop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lop (id INT AUTO_INCREMENT NOT NULL, ten_lop VARCHAR(30) NOT NULL, si_so INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mon_hoc (id INT AUTO_INCREMENT NOT NULL, ten_mon_hoc VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE diem ADD CONSTRAINT FK_F98FCDE02979F59E FOREIGN KEY (ten_hk_id) REFERENCES hoc_ky (id)');
        $this->addSql('ALTER TABLE diem ADD CONSTRAINT FK_F98FCDE0E3E87926 FOREIGN KEY (ten_mon_hoc_id) REFERENCES mon_hoc (id)');
        $this->addSql('ALTER TABLE diem ADD CONSTRAINT FK_F98FCDE0BCD48AEE FOREIGN KEY (ten_hs_id) REFERENCES hoc_sinh (id)');
        $this->addSql('ALTER TABLE hoc_sinh ADD CONSTRAINT FK_A96A2D1B8C4B31AB FOREIGN KEY (ten_lop_id) REFERENCES lop (id)');
        $this->addSql('ALTER TABLE lich_hoc ADD CONSTRAINT FK_381EE035E3E87926 FOREIGN KEY (ten_mon_hoc_id) REFERENCES mon_hoc (id)');
        $this->addSql('ALTER TABLE lich_hoc ADD CONSTRAINT FK_381EE0358C4B31AB FOREIGN KEY (ten_lop_id) REFERENCES lop (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE diem DROP FOREIGN KEY FK_F98FCDE02979F59E');
        $this->addSql('ALTER TABLE diem DROP FOREIGN KEY FK_F98FCDE0E3E87926');
        $this->addSql('ALTER TABLE diem DROP FOREIGN KEY FK_F98FCDE0BCD48AEE');
        $this->addSql('ALTER TABLE hoc_sinh DROP FOREIGN KEY FK_A96A2D1B8C4B31AB');
        $this->addSql('ALTER TABLE lich_hoc DROP FOREIGN KEY FK_381EE035E3E87926');
        $this->addSql('ALTER TABLE lich_hoc DROP FOREIGN KEY FK_381EE0358C4B31AB');
        $this->addSql('DROP TABLE diem');
        $this->addSql('DROP TABLE hoc_ky');
        $this->addSql('DROP TABLE hoc_sinh');
        $this->addSql('DROP TABLE lich_hoc');
        $this->addSql('DROP TABLE lop');
        $this->addSql('DROP TABLE mon_hoc');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
