# SYMFONY SHOPWARE CONNECTION API BUNDLE


This Symfony Bundel allows connection to the Shopware 5.x platform


## Requirements
- Shopware 5.x or higher
- PHP 7.0 or higher


## Installation

Download the plugin from the release page and enable it in shopware.

## Usage

Update your `routes.yaml` in your /config directory and fill in your own values

```
app_bundle_shopware_api:
    resource: '@LmaDevShopwareApiBundle/Resources/config/routes.yaml'
```
Update your `services.yaml` in your /config directory and fill in your own values

```
parameters:
    lma_dev.shopware_api_bundle.user: {user}
    lma_dev.shopware_api_bundle.api_key: {api_key}
    lma_dev.shopware_api_bundle.shop_url: https://example.dev/api
services:
    # default configuration for services in *this* file
    App\LmaDev\ShopwareApiBundle\DependencyInjection\Service\ConnectionApi:
            bind:
                string $user: '%lma_dev.shopware_api_bundle.user%'
                string $apiKey: '%lma_dev.shopware_api_bundle.api_key%'
```
Update your `bundles.yaml` in your /config directory and fill in your own values

```
App\LmaDev\ShopwareApiBundle\LmaDevShopwareApiBundle::class => ['all' => true]
```
## Contributing

Feel free to fork and send pull requests!


## Licence

This project uses the MIT License.