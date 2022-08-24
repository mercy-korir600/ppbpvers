ALTER TABLE `aefis` ADD `webradr_ref` VARCHAR(255) NULL DEFAULT NULL AFTER `vigiflow_date`, ADD `webradr_date` DATETIME NULL DEFAULT NULL AFTER `webradr_ref`,ADD `webradr_message` VARCHAR(255) NULL DEFAULT NULL AFTER `webradr_date`;
ALTER TABLE `sadrs` ADD `webradr_ref` VARCHAR(255) NULL DEFAULT NULL AFTER `vigiflow_date`, ADD `webradr_date` DATETIME NULL DEFAULT NULL AFTER `webradr_ref`,ADD `webradr_message` VARCHAR(255) NULL DEFAULT NULL AFTER `webradr_date`, ADD `submitted_date` DATETIME NULL DEFAULT NULL AFTER `webradr_date`;

ALTER TABLE `aefis` ADD `webradr_ref` VARCHAR(255) NULL DEFAULT NULL AFTER `vigiflow_date`, ADD `webradr_date` DATETIME NULL DEFAULT NULL AFTER `webradr_ref`,ADD `webradr_message` VARCHAR(255) NULL DEFAULT NULL AFTER `webradr_date`, ADD `submitted_date` DATETIME NULL DEFAULT NULL AFTER `webradr_date`;

ALTER TABLE `sadrs`  ADD `submitted_date` DATETIME  NULL DEFAULT NULL AFTER `webradr_date`;
ALTER TABLE `pqmps`  ADD `submitted_date` DATETIME  NULL DEFAULT NULL AFTER `submitted`;
ALTER TABLE `transfusions`  ADD `submitted_date` DATETIME  NULL DEFAULT NULL AFTER `submitted`;
ALTER TABLE `medications`  ADD `submitted_date` DATETIME  NULL DEFAULT NULL AFTER `submitted`;
ALTER TABLE `devices`  ADD `submitted_date` DATETIME  NULL DEFAULT NULL AFTER `submitted`;
ALTER TABLE `aefis`  ADD `submitted_date` DATETIME  NULL DEFAULT NULL AFTER `submitted`;
ALTER TABLE `padrs`  ADD `submitted_date` DATETIME  NULL DEFAULT NULL AFTER `submitted`;
ALTER TABLE `saes`  ADD `submitted_date` DATETIME  NULL DEFAULT NULL AFTER `report_date`;

 
