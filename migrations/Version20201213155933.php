<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201213155933 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articulo (id INT AUTO_INCREMENT NOT NULL, color_id INT NOT NULL, talla_id INT NOT NULL, categoria_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, precio DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_69E94E917ADA1FB5 (color_id), INDEX IDX_69E94E915997DE7B (talla_id), INDEX IDX_69E94E913397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carrito (id INT AUTO_INCREMENT NOT NULL, articulo_id INT NOT NULL, descripcion VARCHAR(255) NOT NULL, cantidad INT NOT NULL, precio_total DOUBLE PRECISION NOT NULL, INDEX IDX_77E6BED52DBC2FC9 (articulo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE talla (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articulo ADD CONSTRAINT FK_69E94E917ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE articulo ADD CONSTRAINT FK_69E94E915997DE7B FOREIGN KEY (talla_id) REFERENCES talla (id)');
        $this->addSql('ALTER TABLE articulo ADD CONSTRAINT FK_69E94E913397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE carrito ADD CONSTRAINT FK_77E6BED52DBC2FC9 FOREIGN KEY (articulo_id) REFERENCES articulo (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carrito DROP FOREIGN KEY FK_77E6BED52DBC2FC9');
        $this->addSql('ALTER TABLE articulo DROP FOREIGN KEY FK_69E94E913397707A');
        $this->addSql('ALTER TABLE articulo DROP FOREIGN KEY FK_69E94E917ADA1FB5');
        $this->addSql('ALTER TABLE articulo DROP FOREIGN KEY FK_69E94E915997DE7B');
        $this->addSql('DROP TABLE articulo');
        $this->addSql('DROP TABLE carrito');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE talla');
    }
}
