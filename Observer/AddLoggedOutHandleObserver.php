<?php
/*
 * @package    SussexDev_AjaxLogin
 * @copyright  Copyright (c) 2019 Scott Parsons
 * @license    https://github.com/ScottParsons/module-ajaxlogin/blob/master/LICENSE.md
 * @version    1.1.1
 */
namespace SussexDev\AjaxLogin\Observer;

use Magento\Customer\Model\Session;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use SussexDev\AjaxLogin\Helper\Data as AjaxLoginHelper;

class AddLoggedOutHandleObserver implements ObserverInterface
{
    /**
     * @var Session
     */
    private $customerSession;

    /**
     * @var AjaxLoginHelper
     */
    private $helper;

    /**
     * AddLoggedOutHandleObserver constructor.
     *
     * @param Session $customerSession
     * @param AjaxLoginHelper $helper
     */
    public function __construct(
        Session $customerSession,
        AjaxLoginHelper $helper
    )
    {
        $this->customerSession = $customerSession;
        $this->helper = $helper;
    }

    /**
     * Add a custom handle responsible for adding the trigger-ajax-login class
     *
     * @param Observer $observer
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute(Observer $observer)
    {
        if ($this->helper->isModuleEnabled()) {
            $layout = $observer->getEvent()->getLayout();
            if (!$this->customerSession->isLoggedIn()) {
                $layout->getUpdate()->addHandle('ajaxlogin_customer_logged_out');
            }
        }
    }
}
