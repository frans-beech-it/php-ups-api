<?php
namespace Ups\Entity;

use Ups\NodeInterface;
use DOMNode;
use DOMDocument;

/**
 * Class Account
 */
class Account extends AbstractToArray implements NodeInterface
{

    /**
     * @var string
     */
    protected $accountNumber = '';

    /**
     * @var string
     */
    protected $accountCountryCode = '';

    /**
     * Get accountNumber
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Set accountNumber
     *
     * @param string $accountNumber
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * Get accountCountryCode
     *
     * @return string
     */
    public function getAccountCountryCode()
    {
        return $this->accountCountryCode;
    }

    /**
     * Set accountCountryCode
     *
     * @param string $accountCountryCode
     */
    public function setAccountCountryCode($accountCountryCode)
    {
        $this->accountCountryCode = $accountCountryCode;
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

        $node = $document->createElement('Account');
        $node->appendChild($document->createElement('AccountNumber', $this->accountNumber));
        $node->appendChild($document->createElement('AccountCountryCode', $this->accountCountryCode));

        return $node;
    }

}