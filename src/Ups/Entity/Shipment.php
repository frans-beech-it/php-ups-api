<?php
namespace Ups\Entity;

class Shipment
{
    /** @deprecated */
    public $Description;
    /** @deprecated */
    public $Shipper;
    /** @deprecated */
    public $ShipTo;
    /** @deprecated */
    public $ShipFrom;
    /** @deprecated */
    public $Service;
    /** @deprecated */
    public $Package = array();
    /** @deprecated */
    public $ShipmentServiceOptions;
    /** @deprecated */
    public $PaymentInformation;

    /**
     * @var PaymentInformation
     */
    private $paymentInformation;

    /**
     * @var RateInformation
     */
    private $rateInformation;

    /**
     * @var string
     */
    private $description;

    /**
     * @var Shipper
     */
    private $shipper;

    /**
     * @var ShipTo;
     */
    private $shipTo;

    /**
     * @var ShipFrom
     */
    private $shipFrom;

    /**
     * @var SoldTo
     */
    private $soldTo;

    /**
     * @var Service
     */
    private $service;

    /**
     * @var Package[]
     */
    private $packages = array();

    /**
     * @var int
     */
    protected $numOfPiecesInShipment = 0;

    /**
     * @var ShipmentServiceOptions
     */
    private $shipmentServiceOptions;

    /**
     * @var bool
     */
    private $goodsNotInFreeCirculationIndicator = FALSE;

    /**
     * @var \stdClass
     */
    protected $itemizedPaymentInformation;

    public function __construct()
    {
        $this->setShipper(new Shipper());
        $this->setShipFrom(new ShipFrom());
        $this->setShipTo(new ShipTo());
        $this->setShipmentServiceOptions(new ShipmentServiceOptions());
        $this->setService(new Service());
        $this->rateInformation = null;
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
     * @param Package $package
     * @return $this
     */
    public function addPackage(Package $package)
    {
        $packages = $this->getPackages();
        $packages[] = $package;
        $this->setPackages($packages);
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->Description = $description;
        $this->description = $description;
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
        $this->Package = $packages;
        $this->packages = $packages;
        return $this;
    }

    /**
     * @return Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param Service $service
     * @return $this
     */
    public function setService(Service $service)
    {
        $this->Service = $service;
        $this->service = $service;
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
        $this->ShipFrom = $shipFrom;
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
        $this->ShipTo = $shipTo;
        $this->shipTo = $shipTo;
        return $this;
    }

    /**
     * @return SoldTo
     */
    public function getSoldTo()
    {
        return $this->soldTo;
    }

    /**
     * @param SoldTo $soldTo
     * @return $this
     */
    public function setSoldTo(SoldTo $soldTo)
    {
        $this->soldTo = $soldTo;
        return $this;
    }

    /**
     * @return ShipmentServiceOptions
     */
    public function getShipmentServiceOptions()
    {
        return $this->shipmentServiceOptions;
    }

    /**
     * @param ShipmentServiceOptions $shipmentServiceOptions
     * @return $this
     */
    public function setShipmentServiceOptions(ShipmentServiceOptions $shipmentServiceOptions)
    {
        $this->ShipmentServiceOptions = $shipmentServiceOptions;
        $this->shipmentServiceOptions = $shipmentServiceOptions;
        return $this;
    }

    /**
     * @return Shipper
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * @param Shipper $shipper
     * @return $this
     */
    public function setShipper(Shipper $shipper)
    {
        $this->Shipper = $shipper;
        $this->shipper = $shipper;
        return $this;
    }

    /**
     * @return PaymentInformation
     */
    public function getPaymentInformation()
    {
        return $this->paymentInformation;
    }

    /**
     * @param PaymentInformation $paymentInformation
     * @return $this
     */
    public function setPaymentInformation(PaymentInformation $paymentInformation)
    {
        $this->PaymentInformation = $paymentInformation;
        $this->paymentInformation = $paymentInformation;
        return $this;
    }

    /**
     * If called, returned prices will include negotiated rates (discounts will be applied)
     */
    public function showNegotiatedRates()
    {
        $this->rateInformation = new RateInformation();
        $this->rateInformation->setNegotiatedRatesIndicator(true);
    }

    /**
     * @return null|RateInformation
     */
    public function getRateInformation()
    {
        return $this->rateInformation;
    }

    /**
     * Get goodsNotInFreeCirculationIndicator
     *
     * @return boolean
     */
    public function getGoodsNotInFreeCirculationIndicator()
    {
        return $this->goodsNotInFreeCirculationIndicator;
    }

    /**
     * Set goodsNotInFreeCirculationIndicator
     *
     * @param boolean $goodsNotInFreeCirculationIndicator
     */
    public function setGoodsNotInFreeCirculationIndicator($goodsNotInFreeCirculationIndicator)
    {
        $this->goodsNotInFreeCirculationIndicator = $goodsNotInFreeCirculationIndicator;
    }

    /**
     * Get itemizedPaymentInformation
     *
     * @return \stdClass
     */
    public function getItemizedPaymentInformation()
    {
        return $this->itemizedPaymentInformation;
    }

    /**
     * Set itemizedPaymentInformation
     *
     * @param \stdClass $itemizedPaymentInformation
     */
    public function setItemizedPaymentInformation($itemizedPaymentInformation)
    {
        $this->itemizedPaymentInformation = $itemizedPaymentInformation;
    }

    /**
     * Get numOfPiecesInShipment
     *
     * @return int
     */
    public function getNumOfPiecesInShipment()
    {
        return $this->numOfPiecesInShipment;
    }

    /**
     * Set numOfPiecesInShipment
     *
     * @param int $numOfPiecesInShipment
     */
    public function setNumOfPiecesInShipment($numOfPiecesInShipment)
    {
        $this->numOfPiecesInShipment = $numOfPiecesInShipment;
    }
}