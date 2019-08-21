<?php

// Includes the autoloader for libraries installed with composer
require __DIR__ . '/vendor/autoload.php';

// Import the Google Cloud KMS client library.
use Google\Cloud\Kms\V1\KeyManagementServiceClient;

// Your Google Cloud Platform project ID
$projectId = getenv('PROJ');

// Lists keys in the "global" location. Could also be "us-west1", etc.
$locationId = 'global';

// Instantiate the client
$kms = new KeyManagementServiceClient();

$locationName = $kms->locationName($projectId, $locationId);

// list all key rings for your project
$keyRings = $kms->listKeyRings($locationName);

// Print the key rings
echo 'Key Rings: ' . PHP_EOL;
foreach ($keyRings as $keyRing) {
    echo $keyRing->getName() . PHP_EOL;
}