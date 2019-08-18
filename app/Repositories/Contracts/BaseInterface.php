<?php


namespace App\Repositories\Contracts;


/**
 * Interface BaseInterface
 *
 * @package App\Repositories\Contracts
 */
interface BaseInterface
{
    /**
     * @param array $relations
     * @return mixed
     */
    public function getAll(array $relations = []);

    /**
     * @param int $count
     * @param array $relations
     * @return mixed
     */
    public function paginate(int $count, array $relations = []);

    /**
     * @param int $id
     * @param array $relations
     * @return mixed
     */
    public function getById(int $id, array $relations = []);

    /**
     * @param string $field
     * @param $value
     * @return mixed
     */
    public function findBy(string $field, $value);

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id);
}