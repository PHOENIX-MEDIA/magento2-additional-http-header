<?php
/**
 * AdditionalHttpHeader
 *
 * @category   Phoenix
 * @package    Phoenix_AdditionalHttpHeader
 * @copyright  Copyright (c) 2020 PHOENIX MEDIA GmbH (http://www.phoenix-media.eu)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Phoenix\AdditionalHttpHeader\Model\Handler;

use Magento\Framework\App\Response\Http;
use Phoenix\AdditionalHttpHeader\Api\AdditionalHttpHeaderInterface;
use Phoenix\AdditionalHttpHeader\Model\Config;

abstract class HandlerAbstract implements AdditionalHttpHeaderInterface
{
    const XML_PATH_ADDITIONAL_HTTP_HEADER_ENABLED_FLAG = '';

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Http
     */
    protected $response;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdditionalHttpHeader(Http $response)
    {
        if ($this::XML_PATH_ADDITIONAL_HTTP_HEADER_ENABLED_FLAG != '' &&
            $this->config->isEnabled($this::XML_PATH_ADDITIONAL_HTTP_HEADER_ENABLED_FLAG) === false) {
            return $this;
        }

        $this->response = $response;
        $this->process();
        return $this;
    }

    protected function process()
    {
        throw new \BadMethodCallException();
    }

    /**
     * @param string $name
     * @param string $value
     * @return $this
     */
    protected function setHeader(string $name, string $value)
    {
        $this->getResponse()->setHeader($name, $value, true);
        return $this;
    }

    /**
     * @return Http
     */
    protected function getResponse()
    {
        return $this->response;
    }
}
