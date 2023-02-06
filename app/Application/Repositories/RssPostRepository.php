<?php

namespace App\Application\Repositories;

use App\Application\Repositories\CoreRepository;
use App\Models\RssPost as Model;
use Illuminate\Pagination\LengthAwarePaginator;


final class RssPostRepository extends CoreRepository
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
     * @param  array $post
     * @return void
     */
    public function save(array $post): void
    {
        $this->startCondition()->firstOrCreate(['guid' => $post['guid']], $post);
    }
    
        
    /**
     * getPaginate
     *
     * @param  array $fields
     * @param  string $sortDir
     * @param  int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginate(array $fields, string $sortDir, int $perPage = 20): LengthAwarePaginator
    {
        return $this->startCondition()->select($fields)->orderBy('published_at', $sortDir)->paginate($perPage);
    }
}