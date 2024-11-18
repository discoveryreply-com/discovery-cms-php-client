<?php

require '../vendor/autoload.php';

use DiscoveryCms\PhpClient\Connector\DiscoveryConnector;

$discoveryConnector = new DiscoveryConnector([
    'api_root' => 'https://HOSTNAME',
    'api_token' => 'YOUR_API_TOKEN',
    'property_title' => 'YOUR_PROPERTY',
    'components_namespace' => 'DiscoveryCms\\PhpClient\\SampleApp\\Components',
]);

$page = $discoveryConnector->fetchDiscoveryPage('home');

?>

<div>Header</div>

<?php $discoveryConnector->renderPage($page); ?>

<div>Footer</div>
