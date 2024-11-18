# Simple PHP Client for Discovery CMS.

After download, run: `composer install`.

Edit `public/index.php` to configure your API root and API token:

```
$discoveryConnector = new DiscoveryConnector([
    'api_root' => 'https://HOSTNAME',
    'api_token' => 'YOUR_API_TOKEN',
    'property_title' => 'YOUR_PROPERTY',
    'components_namespace' => 'DiscoveryCms\\PhpClient\\SampleApp\\Components',
]);
```

Run a local web server with:

`php -S localhost:8080 -t public`

You can change port if 8080 is already used.

