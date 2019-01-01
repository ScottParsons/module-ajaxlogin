<?php
/*
 * @package    SussexDev_AjaxLogin
 * @copyright  Copyright (c) 2019 Scott Parsons
 * @license    https://github.com/ScottParsons/module-ajaxlogin/blob/master/LICENSE.md
 * @version    1.1.1
 */
namespace SussexDev\AjaxLogin\Plugin;

use Magento\Customer\Model\Context;
use SussexDev\AjaxLogin\Helper\Data as AjaxLoginHelper;

class ModifySignInHrefPlugin
{
    /**
     * Customer session
     *
     * @var \Magento\Framework\App\Http\Context
     */
    protected $httpContext;

    /**
     * @var AjaxLoginHelper
     */
    protected $helper;

    /**
     * ModifySignInHrefPlugin constructor.
     *
     * @param \Magento\Framework\App\Http\Context $httpContext
     * @param AjaxLoginHelper $helper
     */
    public function __construct(
        \Magento\Framework\App\Http\Context $httpContext,
        AjaxLoginHelper $helper
    )
    {
        $this->httpContext = $httpContext;
        $this->helper = $helper;
    }

    /**
     * @param \Magento\Customer\Block\Account\AuthorizationLink $subject
     * @param $result
     * @return string
     */
    public function afterGetHref(\Magento\Customer\Block\Account\AuthorizationLink $subject, $result)
    {
        if ($this->helper->isModuleEnabled()) {
            if (!$this->isLoggedIn()) {
                $result = '#';
            }
        }
        return $result;
    }

    /**
     * Check if customer is logged in
     *
     * @return bool
     */
    public function isLoggedIn()
    {
        return $this->httpContext->getValue(Context::CONTEXT_AUTH);
    }
}
