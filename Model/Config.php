<?php
/**
 * AdditionalHttpHeader
 *
 * @category   Phoenix
 * @package    Phoenix_AdditionalHttpHeader
 * @copyright  Copyright (c) 2020 PHOENIX MEDIA GmbH (http://www.phoenix-media.eu)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Phoenix\AdditionalHttpHeader\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    const XML_GENERAL_CONFIG_PATH = 'additionalhttpheader/general/';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var array
     */
    protected $additionalHttpHeaderHandler;

    /**
     * Constructor
     *
     * @param ScopeConfigInterface $scopeConfig
     * @param array $additionalHttpHeaderHandler
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        $additionalHttpHeaderHandler = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->additionalHttpHeaderHandler = $additionalHttpHeaderHandler;
    }

    /**
     * @param string $path
     * @param null $scopeCode
     * @return bool
     */
    public function isEnabled(string $path = '', $scopeCode = null): bool
    {
        if ($path == '') {
            $path = self::XML_GENERAL_CONFIG_PATH . 'enabled';
        }

        return (bool)$this->scopeConfig->getValue(
            $path,
            ScopeInterface::SCOPE_STORE,
            $scopeCode
        );
    }

    /**
     * @return array
     */
    public function getAdditionalHttpHeaderHandler(): array
    {
        return $this->additionalHttpHeaderHandler;
    }
}
