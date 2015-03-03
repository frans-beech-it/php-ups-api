<?php
namespace Ups\Entity;

/**
 * Class PickupPiece
 */
class PickupPiece extends AbstractToArray
{

    /**
     * @var string
     */
    protected $serviceCode = '001';

    /**
     * @var int
     */
    protected $quantity = 1;

    /**
     * @var string
     */
    protected $destinationCountryCode = '';

    /**
     * @var string
     */
    protected $containerCode = '01';

    /**
     * Get serviceCode
     *
     * @return string
     */
    public function getServiceCode()
    {
        return $this->serviceCode;
    }

    /**
     * Set serviceCode
     *
     * @param string $serviceCode
     */
    public function setServiceCode($serviceCode)
    {
        $this->serviceCode = $serviceCode;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set quantity
     *
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Get destinationCountryCode
     *
     * @return string
     */
    public function getDestinationCountryCode()
    {
        return $this->destinationCountryCode;
    }

    /**
     * Set destinationCountryCode
     *
     * @param string $destinationCountryCode
     */
    public function setDestinationCountryCode($destinationCountryCode)
    {
        $this->destinationCountryCode = $destinationCountryCode;
    }

    /**
     * Get containerCode
     *
     * @return string
     */
    public function getContainerCode()
    {
        return $this->containerCode;
    }

    /**
     * Set containerCode
     *
     * @param string $containerCode
     */
    public function setContainerCode($containerCode)
    {
        $this->containerCode = $containerCode;
    }
}