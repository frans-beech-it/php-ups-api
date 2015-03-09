<?php
namespace Ups;

/**
 * Class UpsSoap
 */
class UpsSoap extends Ups
{

    /**
     * @var string
     */
    protected $wsdlBaseUrl = '';

    /**
     * Constructor
     *
     * @param string|null $accessKey UPS License Access Key
     * @param string|null $userId UPS User ID
     * @param string|null $password UPS User Password
     * @param bool $useIntegration Determine if we should use production or CIE URLs.
     * @param string $wsdlBaseUrl
     */
    public function __construct($accessKey = null, $userId = null, $password = null, $useIntegration = false, $wsdlBaseUrl = NULL)
    {
        parent::__construct($accessKey, $userId, $password, $useIntegration);

        $this->wsdlBaseUrl = $wsdlBaseUrl === NULL ? __DIR__ . '/../../wsdl/' : $wsdlBaseUrl;
    }

    /**
     * Send request to UPS
     *
     * @param string $operation
     * @param string $data
     * @return mixed
     * @throws \Exception
     */
    protected function request($operation, $data)
    {
        $requestInstance = new SoapRequest;
        $requestInstance->setAccess($this->accessKey);
        $requestInstance->setUsername($this->userId);
        $requestInstance->setPassword($this->password);
        $requestInstance->setEndPointUrl($this->compileEndpointUrl());
        $requestInstance->setWsdl($this->wsdlBaseUrl . $this->wsdl . '.wsdl');
        $requestInstance->setLogLevel($this->logLevel);
        $requestInstance->setLogPath($this->logPath);

        try {
            $response = $requestInstance->request($operation, $data);
        } catch (\SoapFault $e) {
            if (isset($e->detail)) {
                $code = (int)$e->detail->Errors->ErrorDetail->PrimaryErrorCode->Code;
                $severity = $e->detail->Errors->ErrorDetail->Severity;
                $message = $e->detail->Errors->ErrorDetail->PrimaryErrorCode->Description;
            } else {
                $code = $e->getCode();
                $severity = 'Hard';
                $message = $e->getMessage();
            }

            throw new \Exception(
                'Failure (' . $code . ': ' . $severity . ') ' . $message,
                $code,
                $e
            );
        }

        unset($response->Response);
        return $response;
    }
}