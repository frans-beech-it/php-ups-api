<?php
namespace Ups\Entity;

use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

/**
 * Class Pickup
 */
class FreightPickup extends AbstractToArray implements NodeInterface
{

    /**
     * @var Requester
     */
    protected $requester;

    /**
     * @var ShipTo;
     */
    protected $shipTo;

    /**
     * @var ShipFrom
     */
    protected $shipFrom;

    /**
     * @var int
     */
    protected $numberOfPieces = 1;

    /**
     * @var PackagingType
     */
    protected $packagingType;

    /**
     * @var PackageWeight
     */
    protected $weight;

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
     * @var string
     */
    protected $pickupInstructions = '';

    /**
     * @var string
     */
    protected $handlingInstructions = '';

    /**
     * @var string
     */
    protected $specialInstructions = '';

    /**
     * @var string
     */
    protected $deliveryInstructions = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setRequester(new Requester());
        $this->setShipFrom(new ShipFrom());
        $this->setShipTo(new ShipTo());
    }

    /**
     * Get requester
     *
     * @return Requester
     */
    public function getRequester()
    {
        return $this->requester;
    }

    /**
     * Set requester
     *
     * @param Requester $requester
     */
    public function setRequester($requester)
    {
        $this->requester = $requester;
    }

    /**
     * @param Package $package
     * @return $this
     */
    public function addPackage(Package $package)
    {
        $this->packages[] = $package;
        return $this;
    }

    /**
     * @return Package[]
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * @param Package[] $packages
     * @return $this
     */
    public function setPackages(array $packages)
    {
        $this->packages = $packages;
        return $this;
    }

    /**
     * @return ShipFrom
     */
    public function getShipFrom()
    {
        return $this->shipFrom;
    }

    /**
     * @param ShipFrom $shipFrom
     * @return $this
     */
    public function setShipFrom(ShipFrom $shipFrom)
    {
        $this->shipFrom = $shipFrom;
        return $this;
    }

    /**
     * @return ShipTo
     */
    public function getShipTo()
    {
        return $this->shipTo;
    }

    /**
     * @param ShipTo $shipTo
     * @return $this
     */
    public function setShipTo(ShipTo $shipTo)
    {
        $this->shipTo = $shipTo;
        return $this;
    }

    /**
     * Get numberOfPieces
     *
     * @return int
     */
    public function getNumberOfPieces()
    {
        return $this->numberOfPieces;
    }

    /**
     * Set numberOfPieces
     *
     * @param int $numberOfPieces
     */
    public function setNumberOfPieces($numberOfPieces)
    {
        $this->numberOfPieces = $numberOfPieces;
    }

    /**
     * Get packagingType
     *
     * @return PackagingType
     */
    public function getPackagingType()
    {
        return $this->packagingType;
    }

    /**
     * Set packagingType
     *
     * @param PackagingType $packagingType
     */
    public function setPackagingType($packagingType)
    {
        $this->packagingType = $packagingType;
    }

    /**
     * Get weight
     *
     * @return PackageWeight
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set weight
     *
     * @param PackageWeight $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
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
     * Get pickupInstructions
     *
     * @return string
     */
    public function getPickupInstructions()
    {
        return $this->pickupInstructions;
    }

    /**
     * Set pickupInstructions
     *
     * @param string $pickupInstructions
     */
    public function setPickupInstructions($pickupInstructions)
    {
        $this->pickupInstructions = $pickupInstructions;
    }

    /**
     * Get handlingInstructions
     *
     * @return string
     */
    public function getHandlingInstructions()
    {
        return $this->handlingInstructions;
    }

    /**
     * Set handlingInstructions
     *
     * @param string $handlingInstructions
     */
    public function setHandlingInstructions($handlingInstructions)
    {
        $this->handlingInstructions = $handlingInstructions;
    }

    /**
     * Get specialInstructions
     *
     * @return string
     */
    public function getSpecialInstructions()
    {
        return $this->specialInstructions;
    }

    /**
     * Set specialInstructions
     *
     * @param string $specialInstructions
     */
    public function setSpecialInstructions($specialInstructions)
    {
        $this->specialInstructions = $specialInstructions;
    }

    /**
     * Get deliveryInstructions
     *
     * @return string
     */
    public function getDeliveryInstructions()
    {
        return $this->deliveryInstructions;
    }

    /**
     * Set deliveryInstructions
     *
     * @param string $deliveryInstructions
     */
    public function setDeliveryInstructions($deliveryInstructions)
    {
        $this->deliveryInstructions = $deliveryInstructions;
    }

    /**
     * @param null|DOMDocument $document
     * @return DOMNode
     */
    public function toNode(DOMDocument $document = NULL)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('FreightPickupRequest');
        $node->appendChild($this->requester->toNode($document));
        $node->appendChild($this->shipTo->toNode($document));
        $node->appendChild($this->shipFrom->toNode($document));
        if ($this->weight) {
            $node->appendChild($this->weight->toNode($document));
        }
        if ($this->packagingType) {
            $node->appendChild($this->packagingType->toNode($document));
        }
        $node->appendChild($document->createElement('PickupDate', $this->date->format('Ymd')));
        $node->appendChild($document->createElement('EarliestTimeReady', gmdate('Hi', $this->earliestTime)));
        $node->appendChild($document->createElement('LatestTimeReady', gmdate('Hi', $this->latestTime)));

        if ($this->pickupInstructions) {
            $node->appendChild($document->createElement('PickupInstructions', $this->pickupInstructions));
        }
        if ($this->handlingInstructions) {
            $node->appendChild($document->createElement('HandlingInstructions', $this->handlingInstructions));
        }
        if ($this->specialInstructions) {
            $node->appendChild($document->createElement('SpecialInstructions', $this->specialInstructions));
        }
        if ($this->deliveryInstructions) {
            $node->appendChild($document->createElement('DeliveryInstructions', $this->deliveryInstructions));
        }

        return $node;
    }

}