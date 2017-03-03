<?php
/**
 * Amazon SES plugin for Craft CMS 3.x
 *
 * Mail transport strategy using Amazon SES
 *
 * @link      https://www.borucreative.com
 * @copyright Copyright (c) 2017 Boru Creative
 */

namespace Boru\Ses;

use craft\events\RegisterComponentTypesEvent;
use craft\helpers\MailerHelper;
use yii\base\Event;

/**
 * Plugin
 *
 * @author    Boru Creative
 * @package   Ses
 * @since     1.0.0
 */
class Plugin extends \craft\base\Plugin
{
    public static $plugin;

    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            MailerHelper::class,
            MailerHelper::EVENT_REGISTER_MAILER_TRANSPORT_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = Adapter::class;
            }
        );
    }
}
