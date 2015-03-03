<?php
namespace Ups\Entity;

/**
 * Class Pickup
 */
class Pickup extends AbstractToArray
{

    /**
     * @var bool
     */
    protected $ratePickupIndicator = FALSE;

    /**
     * @var string
     */
    protected $taxInformationIndicator;

    /**
     * @var Shipper
     */
    protected $shipper;

    /**
     * @var PickupAddress
     */
    protected $pickupAddress;

    /**
     * @var bool
     */
    protected $alternateAddressIndicator = FALSE;

    /**
     * @var PickupPiece
     */
    protected $pickupPiece;

    /**
     * @var TotalWeight
     */
    protected $totalWeight;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var int (seconds since midnight)
     */
    protected $earliestTime;

    /**
     * @var int (seconds since midnight)
     */
    protected $latestTime;

    /**
     * @var bool
     */
    protected $overweightIndicator = FALSE;

    /**
     * @var string
     */
    protected $paymentMethod = '00';

    /**
     * @var string
     */
    protected $specialInstruction = '';

    /**
     * @var string
     */
    protected $referenceNumber = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setShipper(new Shipper());
    }

    /**
     * Get ratePickupIndicator
     *
     * @return bool
     */
    public function getRatePickupIndicator()
    {
        return $this->ratePickupIndicator;
    }

    /**
     * Set ratePickupIndicator
     *
     * @param bool $ratePickupIndicator
     */
    public function setRatePickupIndicator($ratePickupIndicator)
    {
        $this->ratePickupIndicator = $ratePickupIndicator;
    }

    /**
     * Get taxInformationIndicator
     *
     * @return string
     */
    public function getTaxInformationIndicator()
    {
        return $this->taxInformationIndicator;
    }

    /**
     * Set taxInformationIndicator
     *
     * @param string $taxInformationIndicator
     */
    public function setTaxInformationIndicator($taxInformationIndicator)
    {
        $this->taxInformationIndicator = $taxInformationIndicator;
    }

    /**
     * Get shipper
     *
     * @return Shipper
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * Set shipper
     *
     * @param Shipper $shipper
     */
    public function setShipper($shipper)
    {
        $this->shipper = $shipper;
    }

    /**
     * Get pickupAddress
     *
     * @return PickupAddress
     */
    public function getPickupAddress()
    {
        return $this->pickupAddress;
    }

    /**
     * Set pickupAddress
     *
     * @param PickupAddress $pickupAddress
     */
    public function setPickupAddress($pickupAddress)
    {
        $this->pickupAddress = $pickupAddress;
    }

    /**
     * Get alternateAddressIndicator
     *
     * @return bool
     */
    public function getAlternateAddressIndicator()
    {
        return $this->alternateAddressIndicator;
    }

    /**
     * Set alternateAddressIndicator
     *
     * @param bool $alternateAddressIndicator
     */
    public function setAlternateAddressIndicator($alternateAddressIndicator)
    {
        $this->alternateAddressIndicator = $alternateAddressIndicator;
    }

    /**
     * Get pickupPiece
     *
     * @return PickupPiece
     */
    public function getPickupPiece()
    {
        return $this->pickupPiece;
    }

    /**
     * Set pickupPiece
     *
     * @param PickupPiece $pickupPiece
     */
    public function setPickupPiece($pickupPiece)
    {
        $this->pickupPiece = $pickupPiece;
    }

    /**
     * Get totalWeight
     *
     * @return TotalWeight
     */
    public function getTotalWeight()
    {
        return $this->totalWeight;
    }

    /**
     * Set totalWeight
     *
     * @param TotalWeight $totalWeight
     */
    public function setTotalWeight($totalWeight)
    {
        $this->totalWeight = $totalWeight;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get earliestTime
     *
     * @return int
     */
    public function getEarliestTime()
    {
        return $this->earliestTime;
    }

    /**
     * Set earliestTime
     *
     * @param int $earliestTime
     */
    public function setEarliestTime($earliestTime)
    {
        $this->earliestTime = $earliestTime;
    }

    /**
     * Get latestTime
     *
     * @return int
     */
    public function getLatestTime()
    {
        return $this->latestTime;
    }

    /**
     * Set latestTime
     *
     * @param int $latestTime
     */
    public function setLatestTime($latestTime)
    {
        $this->latestTime = $latestTime;
    }

    /**
     * Get overweightIndicator
     *
     * @return boolean
     */
    public function getOverweightIndicator()
    {
        return $this->overweightIndicator;
    }

    /**
     * Set overweightIndicator
     *
     * @param boolean $overweightIndicator
     */
    public function setOverweightIndicator($overweightIndicator)
    {
        $this->overweightIndicator = $overweightIndicator;
    }

    /**
     * Get paymentMethod
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Set paymentMethod
     *
     * @param string $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * Get specialInstruction
     *
     * @return string
     */
    public function getSpecialInstruction()
    {
        return $this->specialInstruction;
    }

    /**
     * Set specialInstruction
     *
     * @param string $specialInstruction
     */
    public function setSpecialInstruction($specialInstruction)
    {
        $this->specialInstruction = $specialInstruction;
    }

    /**
     * Get referenceNumber
     *
     * @return string
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
    }

    /**
     * Set referenceNumber
     *
     * @param string $referenceNumber
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;
    }

    /**
     * To array
     *
     * @return array
     */
    public function toArray()
    {
        $return = parent::toArray();

        unset($return['Date']);
        unset($return['EarliestTime']);
        unset($return['LatestTime']);

        $return['PickupDateInfo'] = array(
            'PickupDate' => $this->date->format('Ymd'),
            'ReadyTime' => gmdate('Hi', $this->earliestTime),
            'CloseTime' => gmdate('Hi', $this->latestTime),
        );

        return $return;
    }

}