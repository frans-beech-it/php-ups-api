<?php
namespace Ups\Entity;

/**
 * Class Requester
 */
class Requester extends AbstractToArray
{

    /**
     * @var bool
     */
    protected $thirdPartyIndicator = FALSE;

    /**
     * @var string
     */
    protected $attentionName;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var Phone
     */
    protected $phone;

    /**
     * Get thirdPartyIndicator
     *
     * @return boolean
     */
    public function getThirdPartyIndicator()
    {
        return $this->thirdPartyIndicator;
    }

    /**
     * Set thirdPartyIndicator
     *
     * @param boolean $thirdPartyIndicator
     */
    public function setThirdPartyIndicator($thirdPartyIndicator)
    {
        $this->thirdPartyIndicator = $thirdPartyIndicator;
    }

    /**
     * Get attentionName
     *
     * @return string
     */
    public function getAttentionName()
    {
        return $this->attentionName;
    }

    /**
     * Set attentionName
     *
     * @param string $attentionName
     */
    public function setAttentionName($attentionName)
    {
        $this->attentionName = $attentionName;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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