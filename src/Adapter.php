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

use Craft;
use Swift_AWSTransport;
use craft\mail\transportadapters\BaseTransportAdapter;

/**
 * Adapter
 *
 * @author    Boru Creative
 * @package   Ses
 * @since     1.0.0
 */
class Adapter extends BaseTransportAdapter
{
    /**
     * @var string The API Access Key that should be used
     */
    public $accessKey;

    /**
     * @var string The API Secret Key that should be used
     */
    public $secretKey;

    /**
     * @var string The Amazon Region that should be used
     */
    public $region = 'eu-west-1';

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        /** @noinspection ClassConstantCanBeUsedInspection */
        return 'Amazon SES';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'accessKey' => Craft::t('ses', 'Access Key'),
            'secretKey' => Craft::t('ses', 'Secret Key'),
            'region' => Craft::t('ses', 'Region'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accessKey', 'secretKey', 'region'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('ses/settings', [
            'adapter' => $this
        ]);
    }

    /**
     * @inheritdoc
     */
    public function defineTransport()
    {
        return [
            'class' => Swift_AWSTransport::class,
            'accessKeyId' => $this->accessKey,
            'secretKey' => $this->secretKey,
            'endpoint' => "https://email.{$this->region}.amazonaws.com/"
        ];
    }
}
