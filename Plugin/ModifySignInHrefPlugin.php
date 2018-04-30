<?php
/*
 * @package    SussexDev_AjaxLogin
 * @copyright  Copyright (c) 2018 Scott Parsons
 * @license    https://github.com/ScottParsons/module-ajaxlogin/blob/master/LICENSE.md
 * @version    1.0.0
 */
namespace SussexDev\AjaxLogin\Plugin;

use Magento\Customer\Model\Context;

class ModifySignInHrefPlugin
{
    /**
     * Customer session
     *
     * @var \Magento\Framework\App\Http\Context
     */
    protected $httpContext;

    /**
     * ModifySignInHrefPlugin constructor.
     *
     * @param \Magento\Framework\App\Http\Context $httpContext
     */
    public function __construct(
        \Magento\Framework\App\Http\Context $httpContext
    )
    {
        $this->httpContext = $httpContext;
    }

    /**
     * @param \Magento\Customer\Block\Account\AuthorizationLink $subject
     * @param $result
     * @return string
     */
    public function afterGetHref(\Magento\Customer\Block\Account\AuthorizationLink $subject, $result)
    {
        if (!$this->isLoggedIn()) {
            $result = '#';
        }
        return $result;
    }

    /**
     * @return bool
     */
    public function isLoggedIn()
    {
        return $this->httpContext->getValue(Context::CONTEXT_AUTH);
    }
}
