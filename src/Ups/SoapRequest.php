<?php
namespace Ups;

/**
 * Class SoapRequest
 */
class SoapRequest
{

    /**
     * @var string
     */
    protected $username = '';

    /**
     * @var string
     */
    protected $password = '';

    /**
     * @var string
     */
    protected $wsdl = '';

    /**
     * @var string
     */
    protected $endPointUrl = '';

    /**
     * @var string
     */
    protected $access = '';

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Set wsdl
     *
     * @param string $wsdl
     */
    public function setWsdl($wsdl)
    {
        $this->wsdl = $wsdl;
    }

    /**
     * Set endPointUrl
     *
     * @param string $endPointUrl
     */
    public function setEndPointUrl($endPointUrl)
    {
        $this->endPointUrl = $endPointUrl;
    }

    /**
     * Set access
     *
     * @param string $access
     */
    public function setAccess($access)
    {
        $this->access = $access;
    }

    /**
     * @param string $operation
     * @param array $data
     * @return \stdClass
     * @throws \SoapFault
     */
    public function request($operation, $data)
    {

        $mode = array(
            'soap_version' => 'SOAP_1_1',  // use soap 1.1 client
            'trace' => TRUE,
        );

        // initialize soap client
        $client = new \SoapClient($this->wsdl, $mode);
        $client->__setLocation($this->endPointUrl);

        $header = new \SoapHeader(
            'http://www.ups.com/XMLSchema/XOLTWS/UPSS/v1.0',
            'UPSSecurity',
            array(
                'UsernameToken' => array(
                    'Username' => $this->username,
                    'Password' => $this->password,
                ),
                'ServiceAccessToken' => array(
                    'AccessLicenseNumber' => $this->access
                )
            )
        );
        $client->__setSoapHeaders($header);

        return $client->__soapCall($operation, array($data));
    }
}