<?php
namespace Ups\Entity;

/**
 * Class CardAddress
 */
class CardAddress extends Address
{

    /**
     * @param NULL|object $attributes
     */
    public function __construct($attributes = NULL)
    {
        parent::__construct($attributes);
        if (NULL !== $attributes) {
            if (isset($attributes->AddressLine)) {
                $this->setAddressLine1($attributes->AddressLine);
            }
        }
    }

    /**
     * To node
     *
     * @param NULL|\DOMDocument $document
     * @return \DOMElement
     */
    public function toNode(\DOMDocument $document = NULL)
    {
        if (NULL === $document) {
            $document = new \DOMDocument();
        }

        $node = $document->createElement('CardAddress');
        if ($this->getAddressLine1()) {
            $node->appendChild($document->createElement('AddressLine', $this->getAddressLine1()));
        }
        if ($this->getCity()) {
            $node->appendChild($document->createElement('City', $this->getCity()));
        }
        if ($this->getStateProvinceCode()) {
            $node->appendChild($document->createElement('StateProvinceCode', $this->getStateProvinceCode()));
        }
        if ($this->getPostalCode()) {
            $node->appendChild($document->createElement('PostalCode', $this->getPostalCode()));
        }
        if ($this->getCountryCode()) {
            $node->appendChild($document->createElement('CountryCode', $this->getCountryCode()));
        }
        return $node;
    }
}