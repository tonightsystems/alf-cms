<?php

$schema = array(
    "CREATE TABLE IF NOT EXISTS `{$table_prefix}settings` (
        `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
        `name` VARCHAR(255) NOT NULL ,
        `value` TEXT NOT NULL ,
        `created` DATETIME NULL ,
        `modified` DATETIME NULL ,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_general_ci",

    "CREATE  TABLE IF NOT EXISTS `{$table_prefix}users` (
        `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
        `name` VARCHAR(255) NOT NULL ,
        `email` VARCHAR(255) NOT NULL ,
        `password` VARCHAR(32) NOT NULL ,
        `type` VARCHAR(12) NOT NULL DEFAULT 'author' ,
        `created` DATETIME NULL ,
        `modified` DATETIME NULL ,
        PRIMARY KEY (`id`) ,
        UNIQUE INDEX `email_UNIQUE` (`email` ASC)
    ) ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_general_ci",

    "CREATE  TABLE IF NOT EXISTS `{$table_prefix}posts` (
        `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
        `users_id` BIGINT(20) UNSIGNED NOT NULL ,
        `title` VARCHAR(255) NOT NULL ,
        `slug` VARCHAR(255) NOT NULL ,
        `subtitle` VARCHAR(255) NULL ,
        `content` LONGTEXT NOT NULL ,
        `image` VARCHAR(255) NULL ,
        `pubdate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
        `created` DATETIME NULL ,
        `modified` DATETIME NULL ,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_general_ci",

    "CREATE  TABLE IF NOT EXISTS `{$table_prefix}terms` (
        `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
        `name` VARCHAR(255) NOT NULL ,
        `slug` VARCHAR(255) NOT NULL ,
        `created` DATETIME NULL ,
        `modified` DATETIME NULL ,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_general_ci",

    "CREATE  TABLE IF NOT EXISTS `{$table_prefix}posts_terms` (
        `post_id` BIGINT(20) UNSIGNED NOT NULL ,
        `term_id` BIGINT(20) UNSIGNED NOT NULL
    ) ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_general_ci",

    "CREATE  TABLE IF NOT EXISTS `{$table_prefix}comments` (
        `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
        `post_id` BIGINT(20) UNSIGNED NOT NULL ,
        `author` VARCHAR(255) NOT NULL ,
        `email` VARCHAR(255) NOT NULL ,
        `content` LONGTEXT NOT NULL ,
        `date` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
        `created` DATETIME NULL ,
        `modified` DATETIME NULL ,
        PRIMARY KEY (`id`)
    )
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_general_ci"
);
