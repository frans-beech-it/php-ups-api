<?php
namespace Ups;

use SimpleXMLElement;
use Exception;

class Request implements RequestInterface
{

    const LOG_NONE = 0;
    const LOG_FAILED_REQUESTS = 1;
    const LOG_ALL_REQUESTS = 2;

    /**
     * @var string
     */
    protected $access;

    /**
     * @var string
     */
    protected $request;

    /**
     * @var string
     */
    protected $endpointUrl;

    /**
     * Log level
     *
     * @var int
     */
    protected $logLevel = self::LOG_NONE;

    /**
     * Log path (where so save logged requests)
     *
     * @var string
     */
    protected $logPath = NULL;

    /**
     * Send request to UPS
     *
     * @param string $access The access request xml
     * @param string $request The request xml
     * @param string $endpointurl The UPS API Endpoint URL
     * @return ResponseInterface
     * @throws Exception
     * todo: make access, request and endpointurl nullable to make the testable
     */
    public function request($access, $request, $endpointurl)
    {
        $this->setAccess($access);
        $this->setRequest($request);
        $this->setEndpointUrl($endpointurl);

        // Create POST request
        $form = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $this->getAccess() . $this->getRequest()
            )
        );

        $request = stream_context_create($form);

        if (!$handle = fopen($this->getEndpointUrl(), 'rb', false, $request)) {
            throw new Exception("Failure: Connection to Endpoint URL failed.");
        }

        $raw_response = stream_get_contents($handle);
        fclose($handle);

        $result = NULL;
        if ($raw_response != false) {
            $text = $raw_response;
            $response = new SimpleXMLElement($raw_response);
            if (isset($response->Response) && isset($response->Response->ResponseStatusCode)) {
                $responseInstance = new Response;
                $result = $responseInstance->setText($text)->setResponse($response);
            }
        }

        if ($this->logLevel > 0 && $this->logPath) {
            $failed = ($result === NULL ? TRUE : FALSE);
            if (!$failed && !$response instanceof SimpleXMLElement) {
                $failed = TRUE;
            }
            if (!$failed && $response->Response->ResponseStatusCode == 0) {
                $failed = TRUE;
            }

            if (
                $this->logLevel === self::LOG_ALL_REQUESTS
                || ($failed && $this->logLevel === self::LOG_FAILED_REQUESTS)
            ) {
                $logFileName = date('YmdHis') . '-' . ($failed ? 'FAILED' : 'OK') . uniqid() . '.xml';
                file_put_contents($this->logPath . $logFileName, $this->getEndpointUrl() . PHP_EOL .$this->getAccess() . $this->getRequest(). $raw_response);
            }
        }

        if ($result === NULL) {
            throw new Exception("Failure: Response is invalid.");
        }
        return $result;
    }

    /**
     * @param $access
     * @return $this
     */
    public function setAccess($access)
    {
        $this->access = $access;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @param $request
     * @return $this
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param $endpointUrl
     * @return $this
     */
    public function setEndpointUrl($endpointUrl)
    {
        $this->endpointUrl = $endpointUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndpointUrl()
    {
        return $this->endpointUrl;
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
}