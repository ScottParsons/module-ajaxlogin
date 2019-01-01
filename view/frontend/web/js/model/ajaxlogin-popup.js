/*
 * @package    SussexDev_AjaxLogin
 * @copyright  Copyright (c) 2019 Scott Parsons
 * @license    https://github.com/ScottParsons/module-ajaxlogin/blob/master/LICENSE.md
 * @version    1.1.1
 */

define([
    'jquery',
    'Magento_Ui/js/modal/modal'
], function ($, modal) {
    'use strict';

    return {
        modalWindow: null,

        /**
         * Create popUp window for provided element
         *
         * @param {HTMLElement} element
         */
        createPopUp: function (element) {
            var options = {
                'type': 'popup',
                'modalClass': 'popup-authentication',
                'focus': '[name=username]',
                'responsive': true,
                'innerScroll': true,
                'trigger': '.trigger-ajax-login',
                'buttons': []
            };

            this.modalWindow = element;
            modal(options, $(this.modalWindow));

        },
    };
});
