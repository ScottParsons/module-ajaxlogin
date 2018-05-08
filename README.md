# Magento 2 - Ajax Login Module

## Overview

A Magento 2 module that opens a modal enabling the customer to login when clicking on the Sign In top link.

## Requirements

Magento Open Source (CE) Version 2.2.x

## Installation

Include the package.

```bash
$ composer require sussexdev/module-ajaxlogin
```

Enable the module.

```bash
$ php bin/magento module:enable SussexDev_AjaxLogin
$ php bin/magento setup:upgrade
$ php bin/magento cache:clean
```

## Usage

Head to ```Stores -> Configuration -> Customers -> Customer Configuration```, expand the ```Login Options``` section and enable the ```Enable Login Popup``` option.
