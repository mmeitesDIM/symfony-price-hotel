<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190117091058 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE alert (alert_id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, offer_id INT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_17FD46C1A76ED395 (user_id), UNIQUE INDEX UNIQ_17FD46C153C674EE (offer_id), PRIMARY KEY(alert_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking (booking_id INT AUTO_INCREMENT NOT NULL, offer_id INT DEFAULT NULL, user_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, total_price DOUBLE PRECISION NOT NULL, payed TINYINT(1) NOT NULL, INDEX IDX_E00CEDDE53C674EE (offer_id), INDEX IDX_E00CEDDEA76ED395 (user_id), PRIMARY KEY(booking_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bookmark (bookmark_id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, property_id INT DEFAULT NULL, INDEX IDX_DA62921DA76ED395 (user_id), INDEX IDX_DA62921D549213EC (property_id), PRIMARY KEY(bookmark_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (equipement_id INT AUTO_INCREMENT NOT NULL, property_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, equipement_type VARCHAR(255) NOT NULL, image_path VARCHAR(255) NOT NULL, INDEX IDX_B8B4C6F3549213EC (property_id), PRIMARY KEY(equipement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property (property_id INT AUTO_INCREMENT NOT NULL, owner_id INT DEFAULT NULL, image_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, surface INT NOT NULL, bed_number INT NOT NULL, avg_rated DOUBLE PRECISION NOT NULL, property_type VARCHAR(255) NOT NULL, INDEX IDX_8BF21CDE7E3C61F9 (owner_id), UNIQUE INDEX UNIQ_8BF21CDE3DA5256D (image_id), PRIMARY KEY(property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE full_house (property_id INT NOT NULL, room_number INT NOT NULL, PRIMARY KEY(property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (image_id INT AUTO_INCREMENT NOT NULL, `blob` LONGBLOB NOT NULL, PRIMARY KEY(image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (message_id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, owner_id INT DEFAULT NULL, content LONGTEXT NOT NULL, INDEX IDX_B6BD307FA76ED395 (user_id), INDEX IDX_B6BD307F7E3C61F9 (owner_id), PRIMARY KEY(message_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer (offer_id INT AUTO_INCREMENT NOT NULL, property_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_29D6873E549213EC (property_id), PRIMARY KEY(offer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opinion (opinion_id INT AUTO_INCREMENT NOT NULL, booking_id INT DEFAULT NULL, message LONGTEXT NOT NULL, rated DOUBLE PRECISION NOT NULL, INDEX IDX_AB02B0273301C60 (booking_id), PRIMARY KEY(opinion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE owner (owner_id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, rib VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_CF60E67CA76ED395 (user_id), PRIMARY KEY(owner_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE private_room (property_id INT NOT NULL, PRIMARY KEY(property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (room_id INT AUTO_INCREMENT NOT NULL, property_id INT DEFAULT NULL, room_type VARCHAR(255) NOT NULL, INDEX IDX_729F519B549213EC (property_id), PRIMARY KEY(room_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_images (room_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_A15178AB54177093 (room_id), UNIQUE INDEX UNIQ_A15178AB3DA5256D (image_id), PRIMARY KEY(room_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE share_room (property_id INT NOT NULL, place_leaving INT NOT NULL, PRIMARY KEY(property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (user_id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D6493DA5256D (image_id), PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alert ADD CONSTRAINT FK_17FD46C1A76ED395 FOREIGN KEY (user_id) REFERENCES user (user_id)');
        $this->addSql('ALTER TABLE alert ADD CONSTRAINT FK_17FD46C153C674EE FOREIGN KEY (offer_id) REFERENCES offer (offer_id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE53C674EE FOREIGN KEY (offer_id) REFERENCES offer (offer_id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEA76ED395 FOREIGN KEY (user_id) REFERENCES user (user_id)');
        $this->addSql('ALTER TABLE bookmark ADD CONSTRAINT FK_DA62921DA76ED395 FOREIGN KEY (user_id) REFERENCES user (user_id)');
        $this->addSql('ALTER TABLE bookmark ADD CONSTRAINT FK_DA62921D549213EC FOREIGN KEY (property_id) REFERENCES property (property_id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3549213EC FOREIGN KEY (property_id) REFERENCES property (property_id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE7E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (owner_id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE3DA5256D FOREIGN KEY (image_id) REFERENCES image (image_id)');
        $this->addSql('ALTER TABLE full_house ADD CONSTRAINT FK_123A7D1C549213EC FOREIGN KEY (property_id) REFERENCES property (property_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES user (user_id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F7E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (owner_id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E549213EC FOREIGN KEY (property_id) REFERENCES property (property_id)');
        $this->addSql('ALTER TABLE opinion ADD CONSTRAINT FK_AB02B0273301C60 FOREIGN KEY (booking_id) REFERENCES booking (booking_id)');
        $this->addSql('ALTER TABLE owner ADD CONSTRAINT FK_CF60E67CA76ED395 FOREIGN KEY (user_id) REFERENCES user (user_id)');
        $this->addSql('ALTER TABLE private_room ADD CONSTRAINT FK_E25D2525549213EC FOREIGN KEY (property_id) REFERENCES property (property_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B549213EC FOREIGN KEY (property_id) REFERENCES property (property_id)');
        $this->addSql('ALTER TABLE room_images ADD CONSTRAINT FK_A15178AB54177093 FOREIGN KEY (room_id) REFERENCES room (room_id)');
        $this->addSql('ALTER TABLE room_images ADD CONSTRAINT FK_A15178AB3DA5256D FOREIGN KEY (image_id) REFERENCES image (image_id)');
        $this->addSql('ALTER TABLE share_room ADD CONSTRAINT FK_CF585C02549213EC FOREIGN KEY (property_id) REFERENCES property (property_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493DA5256D FOREIGN KEY (image_id) REFERENCES image (image_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE opinion DROP FOREIGN KEY FK_AB02B0273301C60');
        $this->addSql('ALTER TABLE bookmark DROP FOREIGN KEY FK_DA62921D549213EC');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3549213EC');
        $this->addSql('ALTER TABLE full_house DROP FOREIGN KEY FK_123A7D1C549213EC');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E549213EC');
        $this->addSql('ALTER TABLE private_room DROP FOREIGN KEY FK_E25D2525549213EC');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B549213EC');
        $this->addSql('ALTER TABLE share_room DROP FOREIGN KEY FK_CF585C02549213EC');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE3DA5256D');
        $this->addSql('ALTER TABLE room_images DROP FOREIGN KEY FK_A15178AB3DA5256D');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493DA5256D');
        $this->addSql('ALTER TABLE alert DROP FOREIGN KEY FK_17FD46C153C674EE');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE53C674EE');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE7E3C61F9');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F7E3C61F9');
        $this->addSql('ALTER TABLE room_images DROP FOREIGN KEY FK_A15178AB54177093');
        $this->addSql('ALTER TABLE alert DROP FOREIGN KEY FK_17FD46C1A76ED395');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEA76ED395');
        $this->addSql('ALTER TABLE bookmark DROP FOREIGN KEY FK_DA62921DA76ED395');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA76ED395');
        $this->addSql('ALTER TABLE owner DROP FOREIGN KEY FK_CF60E67CA76ED395');
        $this->addSql('DROP TABLE alert');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE bookmark');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE property');
        $this->addSql('DROP TABLE full_house');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE opinion');
        $this->addSql('DROP TABLE owner');
        $this->addSql('DROP TABLE private_room');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE room_images');
        $this->addSql('DROP TABLE share_room');
        $this->addSql('DROP TABLE user');
    }
}
