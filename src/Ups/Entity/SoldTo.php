<?php
namespace Ups\Entity;

use DOMDocument;
use DOMElement;

class SoldTo extends ShipTo
{
    /**
     * @param null|DOMDocument $document
     * @return DOMElement
     */
    public function toNode(DOMDocument $document = null)
    {
        if (null === $document) {
            $document = new DOMDocument();
        }

        $node = $document->createElement('SoldTo');
//        $node->appendChild($document->createElement('CompanyName', null)); // fixme replace null by CompanyName
        if ($this->getAttentionName()) {
            $node->appendChild($document->createElement('AttentionName', $this->getAttentionName()));
        }


        $address = $this->getAddress();
        if (isset($address)) {
            $node->appendChild($address->toNode($document));
        }

        return $node;
    }
}