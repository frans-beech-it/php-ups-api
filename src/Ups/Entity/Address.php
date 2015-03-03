<?php
namespace Ups\Entity;

use DOMDocument;
use DOMElement;
use Ups\NodeInterface;

class Address extends AbstractToArray implements NodeInterface
{

    /**
     * @var string
     */
    protected $addressLine1;

    /**
     * @var string
     */
    protected $addressLine2;

    /**
     * @var string
     */
    protected $addressLine3;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $stateProvinceCode;

    /**
     * @var string
     */
    protected $postalCode;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var string
     */
    protected $politicalDivision1;

    /**
     * @var string
     */
    protected $politicalDivision2;

    /**
     * @var string
     */
    protected $politicalDivision3;

    /**
     * @var string
     */
    protected $postcodePrimaryLow;

    /**
     * @var string
     */
    protected $postcodePrimaryHigh;

    /**
     * @var string
     */
    protected $postcodeExtendedLow;

    /**
     * @var string
     */
    protected $residentialAddressIndicator;

    /**
     * @var string
     */
    protected $consigneeName;

    /**
     * @var string
     */
    protected $streetNumberLow;

    /**
     * @var string
     */
    protected $streetPrefix;

    /**
     * @var string
     */
    protected $streetName;

    /**
     * @var string
     */
    protected $streetType;

    /**
     * @var string
     */
    protected $streetSuffix;

    /**
     * @var string
     */
    protected $buildingName;

    /**
     * @var string
     */
    protected $attentionName;

    /**
     * @var array
     */
    protected $addressExtendedInformation = array();

    /**
     * @param null|object $attributes
     */
    public function __construct($attributes = NULL)
    {
        if (NULL !== $attributes) {
            if (isset($attributes->AddressLine1)) {
                $this->setAddressLine1($attributes->AddressLine1);
            }
            if (isset($attributes->AddressLine2)) {
                $this->setAddressLine2($attributes->AddressLine2);
            }
            if (isset($attributes->AddressLine3)) {
                $this->setAddressLine3($attributes->AddressLine3);
            }
            if (isset($attributes->City)) {
                $this->setCity($attributes->City);
            }
            if (isset($attributes->StateProvinceCode)) {
                $this->setStateProvinceCode($attributes->StateProvinceCode);
            }
            if (isset($attributes->PostalCode)) {
                $this->setPostalCode($attributes->PostalCode);
            }
            if (isset($attributes->CountryCode)) {
                $this->setCountryCode($attributes->CountryCode);
            }
            if (isset($attributes->PoliticalDivision1)) {
                $this->setPoliticalDivision1($attributes->PoliticalDivision1);
            }
            if (isset($attributes->PoliticalDivision2)) {
                $this->setPoliticalDivision2($attributes->PoliticalDivision2);
            }
            if (isset($attributes->PoliticalDivision3)) {
                $this->setPoliticalDivision3($attributes->PoliticalDivision3);
            }
            if (isset($attributes->PostcodePrimaryLow)) {
                $this->setPostcodePrimaryLow($attributes->PostcodePrimaryLow);
            }
            if (isset($attributes->PostcodePrimaryHigh)) {
                $this->setPostcodePrimaryHigh($attributes->PostcodePrimaryHigh);
            }
            if (isset($attributes->PostcodeExtendedLow)) {
                $this->setPostcodeExtendedLow($attributes->PostcodeExtendedLow);
            }
            if (isset($attributes->ResidentialAddressIndicator)) {
                $this->setResidentialAddressIndicator($attributes->ResidentialAddressIndicator);
            }
            if (isset($attributes->ConsigneeName)) {
                $this->setConsigneeName($attributes->ConsigneeName);
            }
            if (isset($attributes->StreetNumberLow)) {
                $this->setStreetNumberLow($attributes->StreetNumberLow);
            }
            if (isset($attributes->StreetPrefix)) {
                $this->setStreetPrefix($attributes->StreetPrefix);
            }
            if (isset($attributes->StreetName)) {
                $this->setStreetName($attributes->StreetName);
            }
            if (isset($attributes->StreetType)) {
                $this->setStreetType($attributes->StreetType);
            }
            if (isset($attributes->StreetSuffix)) {
                $this->setStreetSuffix($attributes->StreetSuffix);
            }
            if (isset($attributes->BuildingName)) {
                $this->setBuildingName($attributes->BuildingName);
            }
            if (isset($attributes->AttentionName)) {
                $this->setAttentionName($attributes->AttentionName);
            }
            if (isset($attributes->AddressExtendedInformation)) {
                $addressExtendedInformation = $this->getAddressExtendedInformation();
                foreach ($attributes->AddressExtendedInformation as $item) {
                    $addressExtendedInformation[] = new ServiceSummary($item);
                }
                $this->setAddressExtendedInformation($addressExtendedInformation);
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

        $node = $document->createElement('Address');
        if ($this->getAddressLine1()) {
            $node->appendChild($document->createElement('AddressLine1', $this->getAddressLine1()));
        }

        if ($this->getAddressLine2()) {
            $node->appendChild($document->createElement('AddressLine2', $this->getAddressLine2()));
        }
        if ($this->getAddressLine3()) {
            $node->appendChild($document->createElement('AddressLine3', $this->getAddressLine3()));
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

    /**
     * @return array
     */
    public function getAddressExtendedInformation()
    {
        return $this->addressExtendedInformation;
    }

    /**
     * @param array $addressExtendedInformation
     * @return $this
     */
    public function setAddressExtendedInformation($addressExtendedInformation)
    {
        $this->addressExtendedInformation = $addressExtendedInformation;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param string $addressLine1
     * @return $this
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param string $addressLine2
     * @return $this
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine3()
    {
        return $this->addressLine3;
    }

    /**
     * @param string $addressLine3
     * @return $this
     */
    public function setAddressLine3($addressLine3)
    {
        $this->addressLine3 = $addressLine3;
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
    public function getBuildingName()
    {
        return $this->buildingName;
    }

    /**
     * @param string $buildingName
     * @return $this
     */
    public function setBuildingName($buildingName)
    {
        $this->buildingName = $buildingName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getConsigneeName()
    {
        return $this->consigneeName;
    }

    /**
     * @param string $consigneeName
     * @return $this
     */
    public function setConsigneeName($consigneeName)
    {
        $this->consigneeName = $consigneeName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoliticalDivision1()
    {
        return $this->politicalDivision1;
    }

    /**
     * @param string $politicalDivision1
     * @return $this
     */
    public function setPoliticalDivision1($politicalDivision1)
    {
        $this->politicalDivision1 = $politicalDivision1;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoliticalDivision2()
    {
        return $this->politicalDivision2;
    }

    /**
     * @param string $politicalDivision2
     * @return $this
     */
    public function setPoliticalDivision2($politicalDivision2)
    {
        $this->politicalDivision2 = $politicalDivision2;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoliticalDivision3()
    {
        return $this->politicalDivision3;
    }

    /**
     * @param string $politicalDivision3
     * @return $this
     */
    public function setPoliticalDivision3($politicalDivision3)
    {
        $this->politicalDivision3 = $politicalDivision3;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostcodeExtendedLow()
    {
        return $this->postcodeExtendedLow;
    }

    /**
     * @param string $postcodeExtendedLow
     * @return $this
     */
    public function setPostcodeExtendedLow($postcodeExtendedLow)
    {
        $this->postcodeExtendedLow = $postcodeExtendedLow;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostcodePrimaryHigh()
    {
        return $this->postcodePrimaryHigh;
    }

    /**
     * @param string $postcodePrimaryHigh
     * @return $this
     */
    public function setPostcodePrimaryHigh($postcodePrimaryHigh)
    {
        $this->postcodePrimaryHigh = $postcodePrimaryHigh;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostcodePrimaryLow()
    {
        return $this->postcodePrimaryLow;
    }

    /**
     * @param string $postcodePrimaryLow
     * @return $this
     */
    public function setPostcodePrimaryLow($postcodePrimaryLow)
    {
        $this->postcodePrimaryLow = $postcodePrimaryLow;
        return $this;
    }

    /**
     * @return string
     */
    public function getResidentialAddressIndicator()
    {
        return $this->residentialAddressIndicator;
    }

    /**
     * @param string $residentialAddressIndicator
     * @return $this
     */
    public function setResidentialAddressIndicator($residentialAddressIndicator)
    {
        $this->residentialAddressIndicator = $residentialAddressIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateProvinceCode()
    {
        return $this->stateProvinceCode;
    }

    /**
     * @param string $stateProvinceCode
     * @return $this
     */
    public function setStateProvinceCode($stateProvinceCode)
    {
        $this->stateProvinceCode = $stateProvinceCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @param string $streetName
     * @return $this
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetNumberLow()
    {
        return $this->streetNumberLow;
    }

    /**
     * @param string $streetNumberLow
     * @return $this
     */
    public function setStreetNumberLow($streetNumberLow)
    {
        $this->streetNumberLow = $streetNumberLow;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetPrefix()
    {
        return $this->streetPrefix;
    }

    /**
     * @param string $streetPrefix
     * @return $this
     */
    public function setStreetPrefix($streetPrefix)
    {
        $this->streetPrefix = $streetPrefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetSuffix()
    {
        return $this->streetSuffix;
    }

    /**
     * @param string $streetSuffix
     * @return $this
     */
    public function setStreetSuffix($streetSuffix)
    {
        $this->streetSuffix = $streetSuffix;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetType()
    {
        return $this->streetType;
    }

    /**
     * @param string $streetType
     * @return $this
     */
    public function setStreetType($streetType)
    {
        $this->streetType = $streetType;
        return $this;
    }
}