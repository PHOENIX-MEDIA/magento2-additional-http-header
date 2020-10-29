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

use Phoenix\AdditionalHttpHeader\Model\Config;

class FullActionName extends HandlerAbstract
{
    const XML_PATH_ADDITIONAL_HTTP_HEADER_ENABLED_FLAG = 'additionalhttpheader/general/full_action_name';

    /**
     * @var \Magento\Framework\App\Request\Http
     */
    protected $request;

    /**
     * FullActionName constructor.
     * @param Config $config
     * @param \Magento\Framework\App\Request\Http $request
     */
    public function __construct(Config $config, \Magento\Framework\App\Request\Http $request)
    {
        parent::__construct($config);
        $this->request = $request;
    }

    protected function process()
    {
        $this->setHeader('X-FULL_ACTION_NAME', $this->request->getFullActionName());
    }
}
