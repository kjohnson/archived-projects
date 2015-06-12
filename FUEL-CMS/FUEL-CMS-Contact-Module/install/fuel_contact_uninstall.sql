DROP TABLE IF EXISTS `fuel_contact_contacts`;
DROP TABLE IF EXISTS `fuel_contact_messages`;
DELETE FROM `fuel_permissions` WHERE `name` LIKE 'contact%';
DELETE FROM `fuel_settings` WHERE `module` = 'contact';