<?php

/**
 * Modelo: WebpayModel
 * Descripcion: Representación modelo WebpayModel
 * Objetivo: Controlar las llamadas de asignacion y retorno de valores para objetos del tipo
 * @author Rodrigo Contreras B.
 * @version 2019-04-17
 * @version 2019-04-17
 */
class WebpayModel {

    private $site = null;
    private $url_return = null;
    private $url_final = null;
    private $amount = null;
    private $sesion = null;
    private $buyorder = null;
    private $formaction = null;
    private $tokenws = null;
    private $salida_id = null;
    private $salida_msg = null;

    /** Getters * */
    function getSite() {
        return $this->site;
    }

    function getUrl_return() {
        return $this->url_return;
    }

    function getUrl_final() {
        return $this->url_final;
    }

    function getAmount() {
        return $this->amount;
    }

    function getSesion() {
        return $this->sesion;
    }

    function getBuyorder() {
        return $this->buyorder;
    }

    function getFormaction() {
        return $this->formaction;
    }

    function getTokenws() {
        return $this->tokenws;
    }

    function getSalida_id() {
        return $this->salida_id;
    }

    function getSalida_msg() {
        return $this->salida_msg;
    }

    /** Setters * */
    function setSite($site) {
        $this->site = $site;
    }

    function setUrl_return($url_return) {
        $this->url_return = $url_return;
    }

    function setUrl_final($url_final) {
        $this->url_final = $url_final;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function setSesion($sesion) {
        $this->sesion = $sesion;
    }

    function setBuyorder($buyorder) {
        $this->buyorder = $buyorder;
    }

    function setFormaction($formaction) {
        $this->formaction = $formaction;
    }

    function setTokenws($tokenws) {
        $this->tokenws = $tokenws;
    }

    function setSalida_id($salida_id) {
        $this->salida_id = $salida_id;
    }

    function setSalida_msg($salida_msg) {
        $this->salida_msg = $salida_msg;
    }

}
