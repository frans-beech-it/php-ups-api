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
     * Log level
     *
     * @var int
     */
    protected $logLevel = Request::LOG_NONE;

    /**
     * Log path (where so save logged requests)
     *
     * @var string
     */
    protected $logPath = NULL;

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
     * Get logLevel
     *
     * @return int
     */
    public function getLogLevel()
    {
        return $this->logLevel;
    }

    /**
     * Set logLevel
     *
     * @param int $logLevel
     */
    public function setLogLevel($logLevel)
    {
        $this->logLevel = $logLevel;
    }

    /**
     * Get logPath
     *
     * @return string
     */
    public function getLogPath()
    {
        return $this->logPath;
    }

    /**
     * Set logPath
     *
     * @param string $logPath
     */
    public function setLogPath($logPath)
    {
        $this->logPath = $logPath;
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

        try {
            $response = $client->__soapCall($operation, array($data));
        } catch (\SoapFault $e) {
            $this->logRequest($client, FALSE);
            throw $e;
        }
        $this->logRequest($client);
        return $response;
    }

    /**
     * Log request
     *
     * @param \SoapClient $client
     * @param $success
     */
    protected function logRequest(\SoapClient $client, $success = TRUE)
    {
        if ($this->logLevel <= 0 || ($this->logLevel === Request::LOG_FAILED_REQUESTS && $success)) {
            return;
        }
        if (!$this->logPath) {
            return;
        }
        $logFileName = date('YmdHis') . '-' . ($success ? 'OK' : 'FAILED') . uniqid('-') . '.xml';
        file_put_contents($this->logPath . $logFileName, $this->endPointUrl . PHP_EOL . $client->__getLastRequestHeaders() . $client->__getLastRequest() . $client->__getLastResponseHeaders() . $client->__getLastResponse());
    }
}