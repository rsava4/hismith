<?php

namespace App\Application\Repositories;

use App\Application\Repositories\CoreRepository;
use App\Models\RequestLog as Model;

final class RequestLogRepository extends CoreRepository
{    
    /**
     * getModelClass
     *
     * @return Model
     */
    protected function getModelClass(): string
    {
        return Model::class;
    }
    
    /**
     * save 
     *
     * @param  array $insert
     * @return void
     */
    public function save(array $insert): void
    {
        $this->startCondition()->create($insert);
    }
}