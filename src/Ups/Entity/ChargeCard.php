<?php
namespace Ups\Entity;

/**
 * Class Account
 */
class ChargeCard extends AbstractToArray
{

    /**
     * @var string
     */
    protected $cardHolderName = '';

    /**
     * @var string
     */
    protected $cardType = '';

    /**
     * @var string
     */
    protected $cardNumber = '';

    /**
     * @var string
     */
    protected $expirationDate = '';

    /**
     * @var string
     */
    protected $securityCode = '';

    /**
     * @var CardAddress
     */
    protected $cardAddress;

    /**
     * Get cardHolderName
     *
     * @return string
     */
    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    /**
     * Set cardHolderName
     *
     * @param string $cardHolderName
     */
    public function setCardHolderName($cardHolderName)
    {
        $this->cardHolderName = $cardHolderName;
    }

    /**
     * Get cardType
     *
     * @return string
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * Set cardType
     *
     * @param string $cardType
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }

    /**
     * Get cardNumber
     *
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set CardNumber
     *
     * @param string $cardNumber
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * Get expirationDate
     *
     * @return string
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Set expirationDate
     *
     * @param string $expirationDate
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * Get securityCode
     *
     * @return string
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * Set securityCode
     *
     * @param string $securityCode
     */
    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;
    }

    /**
     * Get cardAddress
     *
     * @return CardAddress
     */
    public function getCardAddress()
    {
        return $this->cardAddress;
    }

    /**
     * Set cardAddress
     *
     * @param CardAddress $cardAddress
     */
    public function setCardAddress(CardAddress $cardAddress)
    {
        $this->cardAddress = $cardAddress;
    }
}