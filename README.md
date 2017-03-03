# Amazon SES plugin for Craft CMS 3.x

A mail transport for Amazon SES written as a Craft 3 plugin.

## Amazon SES Overview

Amazon Simple Email Service enables you to send and receive email using a reliable and scalable email platform. To learn more check out the [documentation](https://aws.amazon.com/documentation/ses/).


## Installation

To install, just add the plugin to your CraftCMS 3 composer file:

```
composer require borucreative/craft3-ses
```

## Configuring the Amazon SES Mail Transport

In your Craft 3 control panel, under `Settings > Email`, you should see an option for `Amazon SES` under `Transport Type`.

Select `Amazon SES` and a couple of additional fields will appear to allow you to enter your Amazon `access key` and `secret key` as well your configured Amazon `region`.

Once configured, save the configuration. Don't forget to use the `from` address you set up in Amazon SES.
 
---

Brought to you by [Boru Creative](https://www.borucreative.com)
