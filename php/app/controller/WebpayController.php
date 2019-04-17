<?php

define("__SITE__", "http://localhost/test_webpay/");
define("__URL_RETURN__", __SITE__ . "resultado.php");
define("__URL_FINAL__", __SITE__ . "comprobante.php");
define("__AMOUNT__", 20000);
define("__SESION__", 1234567890);
define("__BUYORDER__", strval(rand(100000, 999999999)));
define("__FORMACTION__", null);
define("__TOKENWS__", null);

/**
 * Controller: WebpayController
 * Descripcion: Controlador para Webpay Model
 * Objetivo: Controlar las llamadas de asignacion y retorno de valores para objetos del tipo
 * @author Rodrigo Contreras B.
 * @version 2019-04-17
 * @version 2019-04-17
 */
class WebpayController {

    function init(WebpayModel $webpay) {

        $webpay->setSite(__SITE__);
        $webpay->setUrl_return(__URL_RETURN__);
        $webpay->setUrl_final(__URL_FINAL__);
        $webpay->setAmount(__AMOUNT__);
        $webpay->setSesion(__SESION__);
        $webpay->setBuyorder(__BUYORDER__);
        $webpay->setFormaction(__FORMACTION__);
        $webpay->setTokenws(__TOKENWS__);

        return $webpay;
    }

}
