CREATE TABLE `tipesoal_matkul` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`matkul_id` INT(11) NOT NULL,
	`tipesoal_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `tipesoal_id` (`tipesoal_id`) USING BTREE,
	INDEX `matkul_id` (`matkul_id`) USING BTREE,
	CONSTRAINT `tipesoal_matkul_ibfk_1` FOREIGN KEY (`tipesoal_id`) REFERENCES `ci_online_test`.`tipesoal` (`id_tipesoal`) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT `tipesoal_matkul_ibfk_2` FOREIGN KEY (`matkul_id`) REFERENCES `ci_online_test`.`matkul` (`id_matkul`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=5
;
