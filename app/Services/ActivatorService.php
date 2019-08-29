<?php


namespace App\Services;

use App\Repositories\Contracts\ActivatorInterface;

/**
 * Class ActivatorService
 *
 * @package App\Services
 */
class ActivatorService
{
    protected $srvActivator;

    /**
     * ActivatorService constructor.
     *
     * @param ActivatorInterface $activator
     */
    public function __construct(ActivatorInterface $activator)
    {
        $this->srvActivator = $activator;
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function srvActivate(array $data, $id)
    {
        $activator = [
            $data['fieldName'] => $data['valueId'],
        ];

        $response = $this->srvActivator->update($id, $activator);
        $response->activatedId = $response->about_id;

        return $response;
    }
}