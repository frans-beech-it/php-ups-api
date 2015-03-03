<?php
namespace Ups\Entity;


class TotalWeight extends AbstractToArray
{

    /**
     * @var string
     */
    protected $weight = '';

    /**
     * @var string
     */
    protected $unitOfMeasurement = UnitOfMeasurement::UOM_KGS;

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set weight
     *
     * @param string $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * Get unitOfMeasurement
     *
     * @return string
     */
    public function getUnitOfMeasurement()
    {
        return $this->unitOfMeasurement;
    }

    /**
     * Set unitOfMeasurement
     *
     * @param string $unitOfMeasurement
     */
    public function setUnitOfMeasurement($unitOfMeasurement)
    {
        $this->unitOfMeasurement = $unitOfMeasurement;
    }
}