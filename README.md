Billetel Bundle
===============

## Install with Composer

Run:

```bash
composer require spyrit/billetel-bundle
```


## Enable the bundle

Register the bundle in your application's kernel class:

```php
// app/AppKernel.php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...
            new Spyrit\BilletelBundle\BilletelBundle(),
            // ...
        ];
    }
}
```

## Configure the bundle

```yaml
# app/config/config.yml
billetel:
    api_authorization: YOUR_TOKEN
    api_desk: YOUR_DESK
    api_url: 'http://api.billetel.fr'
```
