DROP TABLE IF EXISTS `wpstg0_rank_math_internal_meta`;
CREATE TABLE `wpstg0_rank_math_internal_meta` (
  `object_id` bigint unsigned NOT NULL,
  `internal_link_count` int unsigned DEFAULT '0',
  `external_link_count` int unsigned DEFAULT '0',
  `incoming_link_count` int unsigned DEFAULT '0',
  PRIMARY KEY (`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
LOCK TABLES `wpstg0_rank_math_internal_meta` WRITE;
INSERT INTO `wpstg0_rank_math_internal_meta` VALUES ('215','0','0','0'), ('449','22','0','0'), ('534','0','0','4'), ('543','0','0','3'), ('558','1','3','4'), ('564','8','2','3'), ('616','1','0','7'), ('624','0','1','3'), ('646','0','2','3'), ('728','0','0','2'), ('745','0','0','0'), ('767','0','0','0'), ('780','0','1','0'), ('792','0','0','0'), ('826','4','6','0'), ('844','2','2','0'), ('862','0','0','3'), ('864','0','0','0'), ('866','0','0','0'), ('893','0','0','0'), ('904','0','2','0'), ('950','0','0','0'), ('983','0','2','0'), ('1023','1','2','0'), ('1040','3','17','0'), ('1173','9','1','0'), ('1473','46','9','22'), ('1709','8','1','0'), ('1971','12','4','12'), ('2158','2','0','3'), ('2262','2','3','0'), ('2451','3','3','4'), ('2667','10','3','9'), ('2688','7','3','8'), ('2818','9','6','5'), ('2890','0','0','0'), ('2924','2','0','0'), ('2939','2','0','7'), ('2951','3','0','5'), ('2967','4','0','5'), ('2976','6','1','3'), ('3011','3','1','0'), ('3243','2','3','0'), ('3250','5','1','4'), ('3280','0','0','0'), ('3281','0','0','0'), ('3399','8','2','3'), ('3406','3','1','4');
UNLOCK TABLES;
