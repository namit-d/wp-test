DROP TABLE IF EXISTS `wpsa_actionscheduler_claims`;
CREATE TABLE `wpsa_actionscheduler_claims` (
  `claim_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date_created_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`claim_id`),
  KEY `date_created_gmt` (`date_created_gmt`)
) ENGINE=InnoDB AUTO_INCREMENT=21951 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
