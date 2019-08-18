<?php

namespace App\Repositories\DB_MySQL;

use Illuminate\Pagination\Paginator;

/**
 * Class BaseRepository
 *
 * @package App\Repositories\DB_MySQL
 */
class BaseRepository
{
    protected $modelName;

    /**
     * @param array $relations
     * @return mixed
     */
    public function getAll(array $relations = [])
    {
        return $this->getNewInstance()->with($relations)->get();
    }

    /**
     * @param int $count
     * @param array $relations
     * @return mixed
     */
    public function paginate(int $count, array $relations = [])
    {
        $instance = $this->getNewInstance();
        $instance = $instance->with($relations)->paginate($count);
        /** @var Paginator $instance */
        $instance->paginate_links = $instance->links();

        return $instance;
    }

    /**
     * @param int $id
     * @param array $relations
     * @return mixed
     */
    public function getById(int $id, array $relations = [])
    {
        $instance = $this->getNewInstance();

        return $instance->with($relations)->find($id);
    }

    /**
     * @param string $field
     * @param $value
     * @return mixed
     */
    public function findBy(string $field, $value)
    {
        $instance = $this->getNewInstance();

        return $instance->where($field, $value)->get();
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data)
    {
        $model = $this->getById($id);

        $model->update($data);

        return $model;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        $model = $this->getNewInstance()->create($data);

        return $model;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $model = $this->getById($id);

        $model->delete();

        return response()->json(1);
    }

    /**
     * @return mixed
     */
    protected function getNewInstance()
    {
        $model = new $this->modelName;

        return $model;
    }

}