<?php
/*
 * @package    SussexDev_AjaxLogin
 * @copyright  Copyright (c) 2019 Scott Parsons
 * @license    https://github.com/ScottParsons/module-ajaxlogin/blob/master/LICENSE.md
 * @version    1.1.1
 */
namespace SussexDev\AjaxLogin\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{
    /**
     * System config path
     */
    const AJAXLOGIN_POPUP_XML_PATH = 'customer/startup/ajaxlogin_enable';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Data constructor.
     *
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig
    )
    {
        parent::__construct($context);
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Check if the module has been enabled in the admin
     *
     * @return bool
     */
    public function isModuleEnabled()
    {
        return $this->scopeConfig->isSetFlag(
            self::AJAXLOGIN_POPUP_XML_PATH,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
