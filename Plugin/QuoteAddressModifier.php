<?php
namespace Netzkollektiv\EasyCreditExtend\Plugin;

class QuoteAddressModifier {

    private $_quote;

    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession
    ) {
	    $this->_quote = $checkoutSession->getQuote();
    }

    public function aroundGetBillingAddress()
    {
       $billingAddress = clone $this->_quote->getBillingAddress();
       $billingAddress->setStreet('my street');
       return new \Netzkollektiv\EasyCredit\BackendApi\Quote\Address($billingAddress);
    }
}
