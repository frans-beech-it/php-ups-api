<?php
namespace Ups\Entity;

/**
 * Class PickupAddress
 */
class PickupAddress extends AbstractToArray
{

    /**
     * @var string
     */
    protected $companyName = '';

    /**
     * @var string
     */
    protected $contactName = '';

    /**
     * @var string
     */
    protected $addressLine = '';

    /**
     * @var string
     */
    protected $room;

    /**
     * @var string
     */
    protected $floor;

    /**
     * @var string
     */
    protected $city = '';

    /**
     * @var string
     */
    protected $stateProvince;

    /**
     * @var string
     */
    protected $urbanization;

    /**
     * @var string
     */
    protected $postalCode = '';

    /**
     * @var string
     */
    protected $countryCode = '';

    /**
     * @var bool
     */
    protected $residentialIndicator = FALSE;

    /**
     * @var string
     */
    protected $pickupPoint = '';

    /**
     * @var Phone
     */
    protected $phone;

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * Get contactName
     *
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * Set contactName
     *
     * @param string $contactName
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;
    }

    /**
     * Get addressLine
     *
     * @return string
     */
    public function getAddressLine()
    {
        return $this->addressLine;
    }

    /**
     * Set addressLine
     *
     * @param string $addressLine
     */
    public function setAddressLine($addressLine)
    {
        $this->addressLine = $addressLine;
    }

    /**
     * Get room
     *
     * @return string
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set room
     *
     * @param string $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * Get floor
     *
     * @return string
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set floor
     *
     * @param string $floor
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get stateProvince
     *
     * @return string
     */
    public function getStateProvince()
    {
        return $this->stateProvince;
    }

    /**
     * Set stateProvince
     *
     * @param string $stateProvince
     */
    public function setStateProvince($stateProvince)
    {
        $this->stateProvince = $stateProvince;
    }

    /**
     * Get urbanization
     *
     * @return string
     */
    public function getUrbanization()
    {
        return $this->urbanization;
    }

    /**
     * Set urbanization
     *
     * @param string $urbanization
     */
    public function setUrbanization($urbanization)
    {
        $this->urbanization = $urbanization;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * Get residentialIndicator
     *
     * @return bool
     */
    public function getResidentialIndicator()
    {
        return $this->residentialIndicator;
    }

    /**
     * Set residentialIndicator
     *
     * @param bool $residentialIndicator
     */
    public function setResidentialIndicator($residentialIndicator)
    {
        $this->residentialIndicator = (bool)$residentialIndicator;
    }

    /**
     * Get pickupPoint
     *
     * @return string
     */
    public function getPickupPoint()
    {
        return $this->pickupPoint;
    }

    /**
     * Set pickupPoint
     *
     * @param string $pickupPoint
     */
    public function setPickupPoint($pickupPoint)
    {
        $this->pickupPoint = $pickupPoint;
    }

    /**
     * Get phone
     *
     * @return Phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phone
     *
     * @param Phone $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
}