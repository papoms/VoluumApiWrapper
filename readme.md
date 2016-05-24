# VoluumApiWrapper
A PHP Api Wrapper for the Voluum Reporting API.
Install using composer

# Usage
```php
require_once(__DIR__.'/vendor/autoload.php');
use PapoMS\VoluumApiWrapper\ReportingClient;

$vrc = new ReportingClient();
$vrc->login('email', 'password');

$campaigns = $vrc->getActiveCampaigns();
$stats = $vrc->campaignReport($campaignId, 'last-30-days', 'day');

```


