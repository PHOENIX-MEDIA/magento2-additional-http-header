<?php
/**
 * AdditionalHttpHeader
 *
 * @category   Phoenix
 * @package    Phoenix_AdditionalHttpHeader
 * @copyright  Copyright (c) 2020 PHOENIX MEDIA GmbH (http://www.phoenix-media.eu)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Phoenix\AdditionalHttpHeader\Model\App\Response;

use Magento\Framework\ObjectManagerInterface as ObjectManager;
use Phoenix\AdditionalHttpHeader\Api\AdditionalHttpHeaderInterface;
use Phoenix\AdditionalHttpHeader\Model\Config;

class HttpPlugin
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    public function __construct(
        Config $config,
        ObjectManager $objectManager
    ) {
        $this->config = $config;
        $this->objectManager = $objectManager;
    }

    /**
     * Set additional headers
     *
     * @param \Magento\Framework\App\Response\Http $subject
     * @return void
     */
    public function beforeSendResponse(\Magento\Framework\App\Response\Http $subject)
    {
        if ($this->config->isEnabled()) {
            foreach ($this->config->getAdditionalHttpHeaderHandler() as $handler) {
                $model = $this->objectManager->get($handler);
                if ($model instanceof AdditionalHttpHeaderInterface) {
                    $model->setAdditionalHttpHeader($subject);
                }
            }
        }
    }
}
