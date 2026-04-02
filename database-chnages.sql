-- 27-03-2026

ALTER TABLE `tbl_lead_magnet` ADD `user_id` INT NOT NULL AFTER `id`, ADD `page_url` VARCHAR(255) NOT NULL AFTER `user_id`;
ALTER TABLE `tbl_lead_magnet` ADD `agent_id` INT NULL DEFAULT NULL AFTER `user_id`; 


-- 30-03-2026
ALTER TABLE `tbl_lead_magnet` ADD `media_path` VARCHAR(255) NULL DEFAULT NULL AFTER `media_type`;


