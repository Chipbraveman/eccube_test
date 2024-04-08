<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240408122107 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $recordCount1 = $this->connection->fetchColumn("
            SELECT COUNT(*) 
            FROM dtb_csv 
            WHERE
                csv_type_id = 1 
                AND entity_name = 'Eccube\\\\Entity\\\\Product'
                AND field_name = 'store_name'
        ");
        
        $this->abortIf($recordCount1 > 0, 'There is already an existing record.');
        $this->addSql("INSERT INTO dtb_csv(csv_type_id, creator_id, entity_name, field_name, reference_field_name, disp_name, sort_no, enabled, create_date, update_date, discriminator_type) VALUES(1, null, 'Eccube\\\\Entity\\\\Product', 'store_name', null, '店舗名', :sortNo, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'csv')");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $sql = <<<SQL
        DELETE FROM dtb_csv WHERE field_name='store_name';
        SQL;
        $this->addSql($sql);

    }
}
