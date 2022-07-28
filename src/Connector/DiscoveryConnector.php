<?php

namespace DiscoveryCms\PhpClient\Connector;

class DiscoveryConnector
{
    private $apiRoot;
    private $apiToken;
    private $componentsNamespace;

    public function __construct(array $options)
    {
        assert(isset($options['components_namespace']), 'Missing mandatory option "components_namespace"');
        assert(isset($options['api_root']), 'Missing mandatory option "api_root"');
        assert(isset($options['api_token']), 'Missing mandatory option "api_token"');

        $this->componentsNamespace = $options['components_namespace'];
        $this->apiRoot = $options['api_root'];
        $this->apiToken = $options['api_token'];
    }

    public function fetchDiscoveryPage(string $slug, array $options = []) {
        $url = $this->apiRoot .'/api/v1/pages/'. $slug . '?token='. $this->apiToken;
        return json_decode(file_get_contents($url));
    }

    public function renderPage(object $page) {
        foreach ($page->components as $componentData) {
            $callback = $this->componentsNamespace . '\\' . $componentData->_type . '::render';
            $callback($componentData);
        }
    }
}