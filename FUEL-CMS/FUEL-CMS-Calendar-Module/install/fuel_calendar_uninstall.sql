DROP TABLE IF EXISTS `fuel_calendar_categories`;
DROP TABLE IF EXISTS `fuel_calendar_events`;
DELETE FROM `fuel_permissions` WHERE `name` LIKE 'calendar%';
DELETE FROM `fuel_settings` WHERE `module` = 'calendar';