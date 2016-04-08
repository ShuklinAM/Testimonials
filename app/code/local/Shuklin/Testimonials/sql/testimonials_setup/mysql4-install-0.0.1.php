<?php

$installer = $this;
$installer->startSetup();

$installer->run("
    DROP TABLE IF EXISTS {$this->getTable('testimonials')};
    CREATE TABLE {$this->getTable('testimonials')} (
         `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
         `customer_id` INT(10) UNSIGNED,
         `testimonial` TEXT NOT NULL,
         `created_at` TIMESTAMP NOT NULL,
         PRIMARY KEY (`id`),
         FOREIGN KEY (`customer_id`) REFERENCES {$this->getTable('customer_entity')} (`entity_id`)
         ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
");

$installer->endSetup();