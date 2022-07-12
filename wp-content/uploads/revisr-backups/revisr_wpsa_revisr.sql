DROP TABLE IF EXISTS `wpsa_revisr`;
CREATE TABLE `wpsa_revisr` (
  `id` mediumint NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `message` text,
  `event` varchar(42) NOT NULL,
  `user` varchar(60) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
LOCK TABLES `wpsa_revisr` WRITE;
INSERT INTO `wpsa_revisr` VALUES ('1','2022-07-11 10:22:30','Successfully created a new repository.','init','namit'), ('2','2022-07-11 10:27:59','Committed <a href=\"https://dev.a1office.co/wp-admin/admin.php?page=revisr_view_commit&commit=64f556a&success=true\">#64f556a</a> to the local repository.','commit','namit'), ('3','2022-07-11 10:28:47','Error pushing changes to the remote repository.','error','namit'), ('4','2022-07-11 10:31:49','Error pushing changes to the remote repository.','error','namit'), ('5','2022-07-11 10:35:11','Error pushing changes to the remote repository.','error','namit'), ('6','2022-07-11 10:42:36','Error pushing changes to the remote repository.','error','namit'), ('7','2022-07-11 10:45:36','Successfully created a new repository.','init','namit'), ('8','2022-07-11 10:46:46','Committed <a href=\"https://dev.a1office.co/wp-admin/admin.php?page=revisr_view_commit&commit=30fb78e&success=true\">#30fb78e</a> to the local repository.','commit','namit'), ('9','2022-07-11 10:48:34','Successfully pushed 1 commit to origin/master.','push','namit'), ('10','2022-07-12 06:13:28','Successfully backed up the database.','backup','namit'), ('11','2022-07-12 06:14:58','Successfully pushed 1 commit to origin/master.','push','namit'), ('12','2022-07-12 07:22:23','There was an error committing the changes to the local repository.','error','rahat@12'), ('13','2022-07-12 07:24:52','Successfully created a new repository.','init','rahat@12');
UNLOCK TABLES;
