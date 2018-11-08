<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\Schema;
use go1\util\DB;
use Doctrine\DBAL\Types\Type;


// load env vars
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

// install schema
$connectionParams = [
    'driver'        => 'pdo_mysql',
    'dbname'        => getenv("DB_NAME"),
    'host'          => getenv("DB_HOST"),
    'user'          => getenv("DB_USERNAME"),
    'password'      => getenv("DB_PASSWORD"),
    'port'          => getenv("DB_PORT"),
    'driverOptions' => [1002 => 'SET NAMES utf8'],
];
$db = DriverManager::getConnection($connectionParams, new Configuration());

DB::install($db, [
	function (Schema $schema) {
		foreach (['in_view', 'card_previewed', 'card_shared'] as $tableSuffix) {
			$tableName = 'search_result_' . $tableSuffix;
			if (!$schema->hasTable($tableName)) {
				$searchResult = $schema->createTable($tableName);
				$searchResult->addColumn('id', Type::INTEGER, ['unsigned' => true, 'autoincrement' => true]);
				$searchResult->addColumn('logical_search_id', Type::STRING);
				$searchResult->addColumn('timestamp', TYPE::INTEGER, ['unsigned' => true]);
				$searchResult->setPrimaryKey(['id']);

				switch ($tableName) {
					case 'search_result_in_view':
						$searchResult->addColumn('rank', Type::INTEGER, ['unsigned' => true]);
						break;
					
					default:
						break;
				}
			}
		}
	}
]);

// generate data

