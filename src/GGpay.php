<?php namespace Sunil\Payments;

use Sunil\Payments\Gateways\CCAvenueGateway;
use Sunil\Payments\Gateways\CitrusGateway;
use Sunil\Payments\Gateways\CitrusPopupGateway;
use Sunil\Payments\Gateways\EBSGateway;
use Sunil\Payments\Gateways\InstaMojoGateway;
use Sunil\Payments\Gateways\PaymentGatewayInterface;
use Sunil\Payments\Gateways\PayUMoneyGateway;

class GGpay {

    protected $gateway;

    /**
     * @param PaymentGatewayInterface $gateway
     */
    function __construct(PaymentGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function purchase($parameters = array())
    {

        return $this->gateway->request($parameters)->send();

    }

    public function response($request)
    {
        return $this->gateway->response($request);
    }

    public function prepare($parameters = array())
    {
        return $this->gateway->request($parameters);
    }

    public function process($order)
    {
        return $order->send();
    }

    public function gateway($name)
    {

        switch($name)
        {
            case 'CCAvenue':
                $this->gateway = new CCAvenueGateway();
                break;

            case 'PayUMoney':
                $this->gateway = new PayUMoneyGateway();
                break;

            case 'EBS':
                $this->gateway = new EBSGateway();
                break;

            case 'Citrus':
                $this->gateway = new CitrusGateway();
                break;

            case 'CitrusPopup':
                $this->gateway = new CitrusPopupGateway();
                break;

            case 'InstaMojo':
                $this->gateway = new InstaMojoGateway();
                break;

        }

        return $this;
    }



}