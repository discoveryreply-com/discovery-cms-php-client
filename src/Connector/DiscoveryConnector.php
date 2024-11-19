<?php

namespace DiscoveryCms\PhpClient\Connector;

class DiscoveryConnector
{
    private $apiRoot;
    private $apiToken;
    private $componentsNamespace;
    private $propertyTitle;

    public function __construct(array $options)
    {
        assert(isset($options['components_namespace']), 'Missing mandatory option "components_namespace"');
        assert(isset($options['api_root']), 'Missing mandatory option "api_root"');
        assert(isset($options['api_token']), 'Missing mandatory option "api_token"');
        assert(isset($options['property_title']), 'Missing mandatory option "property_title"');

        $this->componentsNamespace = $options['components_namespace'];
        $this->apiRoot = $options['api_root'];
        $this->apiToken = $options['api_token'];
        $this->propertyTitle = $options['property_title'];
    }

    public function fetchDiscoveryPage(string $slug, array $options = []) {
        $url = rtrim($this->apiRoot, '/') .'/api/v1/pages/'. ltrim($slug, '/') . '?token='. $this->apiToken;
        return json_decode(file_get_contents($url));
    }

    public function renderPage(object $page) {
        $propertyTitleWithSlash = $this->propertyTitle . '/';
        $propertyTitleWithSlashLen = strlen($propertyTitleWithSlash);

        foreach ($page->components as $componentData) {
            
            if (!str_starts_with($componentData->_type, $propertyTitleWithSlash)) {
                throw new \Exception("Component type {$componentData->_type} does not match property title prefix {$propertyTitleWithSlash}");
            }

            $componentData->_page = $page;  // inject page data into component data
            $type = substr($componentData->_type, $propertyTitleWithSlashLen);
            $callback = $this->componentsNamespace . '\\' . $type . '::render';
            $callback($componentData);
        }
    }
}