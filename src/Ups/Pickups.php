<?php
namespace Ups;

use Ups\Entity\Pickup;

/**
 * Class Pickup
 */
class Pickups extends UpsSoap
{

    /**
     * @var string
     */
    protected $productionBaseUrl = 'https://onlinetools.ups.com/webservices/Pickup';

    /**
     * @var string
     */
    protected $integrationBaseUrl = 'https://wwwcie.ups.com/webservices/Pickup';

    /**
     * @var string
     */
    protected $wsdl = 'Pickup';

    /**
     * @param Pickup $pickup
     * @return mixed
     * @throws \Exception
     */
    public function create(Pickup $pickup)
    {
        $data = $pickup->toArray();
        $data['Request'] = array('RequestOption' => 1);
        return $this->request('ProcessPickupCreation', $data);
    }

    /**
     * Cancel a pickup request
     *
     * @param string $prn
     * @param string $cancelBy
     * @return \stdClass
     * @throws \Exception
     */
    public function cancel($prn, $cancelBy = '02')
    {
        $data = array();
        $data['Request'] = array('RequestOption' => 1);
        $data['CancelBy'] = $cancelBy;
        $data['PRN'] = $prn;
        return $this->request('ProcessPickupCancel', $data);
    }

}