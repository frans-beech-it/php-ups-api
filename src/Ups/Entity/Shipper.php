<?php
namespace Ups\Entity;

use DOMDocument;
use DOMElement;
use Ups\NodeInterface;

class Shipper extends AbstractToArray implements NodeInterface
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $companyName;

    /**
     * @var string
     */
    protected $attentionName;

    /**
     * @var string
     */
    protected $taxIdentificationNumber;

    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var string
     */
    protected $faxNumber;

    /**
     * @var string
     */
    protected $shipperNumber;

    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * @var Address
     */
    protected $address;

    /**
     * @var Account
     */
    protected $account;

    /**
     * @var ChargeCard
     */
    protected $chargeCard;

    /**
     * @param null|object $attributes
     */
    public function __construct($attributes = NULL)
    {
        $this->address = new Address();

        if (NULL !== $attributes) {
            if (isset($attributes->Name)) {
                $this->setName($attributes->Name);
            }
            if (isset($attributes->CompanyName)) {
                $this->setCompanyName($attributes->CompanyName);
            }
            if (isset($attributes->AttentionName)) {
                $this->setAttentionName($attributes->AttentionName);
            }
            if (isset($attributes->TaxIdentificationNumber)) {
                $this->setTaxIdentificationNumber($attributes->TaxIdentificationNumber);
            }
            if (isset($attributes->PhoneNumber)) {
                $this->setPhoneNumber($attributes->PhoneNumber);
            }
            if (isset($attributes->FaxNumber)) {
                $this->setFaxNumber($attributes->FaxNumber);
            }
            if (isset($attributes->ShipperNumber)) {
                $this->setShipperNumber($attributes->ShipperNumber);
            }
            if (isset($attributes->EMailAddress)) {
                $this->setEmailAddress($attributes->EMailAddress);
            }
            if (isset($attributes->Address)) {
                $this->setAddress(new Address($attributes->Address));
            }
        }
    }

    /**
     * Fallback for deprecated public properties
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (method_exists($this, 'get' . $name)) {
            return call_user_func(array($this, 'get' . $name));
        } else {
            return NULL;
        }
    }

    /**
     * @param null|DOMDocument $document
     * @return DOMElement
     */
    public function toNode(DOMDocument $document = NULL)
    {
        if (NULL === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('Shipper');

        $node->appendChild($document->createElement('Name', $this->name));

        if ($this->getAttentionName()) {
            $node->appendChild($document->createElement('AttentionName', $this->getAttentionName()));
        }

        if ($this->getCompanyName()) {
            $node->appendChild($document->createElement('CompanyDisplayableName', $this->getCompanyName()));
        }

        $node->appendChild($document->createElement('ShipperNumber', $this->shipperNumber));

        if ($this->getTaxIdentificationNumber()) {
            $node->appendChild($document->createElement('TaxIdentificationNumber', $this->getTaxIdentificationNumber()));
        }

        if ($this->phoneNumber) {
            $node->appendChild($document->createElement('PhoneNumber', $this->phoneNumber));
        }

        if ($this->faxNumber) {
            $node->appendChild($document->createElement('FaxNumber', $this->faxNumber));
        }

        if ($this->emailAddress) {
            $node->appendChild($document->createElement('EmailAddress', $this->emailAddress));
        }

        if ($this->address) {
            $node->appendChild($this->address->toNode($document));
        }
        if ($this->account) {
            $node->appendChild($this->account->toNode($document));
        }

        return $node;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return $this
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttentionName()
    {
        return $this->attentionName;
    }

    /**
     * @param string $attentionName
     * @return $this
     */
    public function setAttentionName($attentionName)
    {
        $this->attentionName = $attentionName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     * @return $this
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * @param string $faxNumber
     * @return $this
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setCompanyName($name)
    {
        $this->companyName = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return $this
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getShipperNumber()
    {
        return $this->shipperNumber;
    }

    /**
     * @param string $shipperNumber
     * @return $this
     */
    public function setShipperNumber($shipperNumber)
    {
        $this->shipperNumber = $shipperNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxIdentificationNumber()
    {
        return $this->taxIdentificationNumber;
    }

    /**
     * @param string $taxIdentificationNumber
     * @return $this
     */
    public function setTaxIdentificationNumber($taxIdentificationNumber)
    {
        $this->taxIdentificationNumber = $taxIdentificationNumber;
        return $this;
    }

    /**
     * Get account
     *
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set account
     *
     * @param Account $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * Get chargeCard
     *
     * @return ChargeCard
     */
    public function getChargeCard()
    {
        return $this->chargeCard;
    }

    /**
     * Set chargeCard
     *
     * @param ChargeCard $chargeCard
     */
    public function setChargeCard($chargeCard)
    {
        $this->chargeCard = $chargeCard;
    }

}