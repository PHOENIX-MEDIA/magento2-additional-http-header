<?php
/**
 * AdditionalHttpHeader
 *
 * @category   Phoenix
 * @package    Phoenix_AdditionalHttpHeader
 * @copyright  Copyright (c) 2020 PHOENIX MEDIA GmbH (http://www.phoenix-media.eu)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Phoenix\AdditionalHttpHeader\Api;

interface AdditionalHttpHeaderInterface
{
    public function setAdditionalHttpHeader(\Magento\Framework\App\Response\Http $response);
}
