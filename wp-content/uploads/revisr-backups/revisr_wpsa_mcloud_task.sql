DROP TABLE IF EXISTS `wpsa_mcloud_task`;
CREATE TABLE `wpsa_mcloud_task` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `tuid` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `locked` bigint DEFAULT NULL,
  `cli` int NOT NULL DEFAULT '0',
  `shouldCancel` int NOT NULL DEFAULT '0',
  `state` int NOT NULL DEFAULT '0',
  `currentItem` int NOT NULL DEFAULT '0',
  `totalItems` int NOT NULL DEFAULT '0',
  `lastTime` float DEFAULT NULL,
  `startTime` bigint DEFAULT NULL,
  `endTime` bigint DEFAULT NULL,
  `lastRun` bigint DEFAULT NULL,
  `duration` float DEFAULT NULL,
  `timePer` float DEFAULT NULL,
  `memoryPer` bigint DEFAULT NULL,
  `currentItemID` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `currentTitle` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `currentFile` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `currentThumb` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `isIcon` int NOT NULL DEFAULT '0',
  `errorMessage` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;