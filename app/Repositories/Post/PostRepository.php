<?php

namespace App\Repositories\Post;
use App\Repositories\EloquentRepository;
use App\Repositories\Post\PostRepositoryInterface;
use App\Models\Post;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{
    protected $select = ['id', 'admin_id', 'title', 'slug', 'status', 'content', 'created_at'];

    public function getModel(){
        return Post::class;
    }
    public function find($id)
    {
        $this->instance = $this->model->find($id);
        
        // $this->authorize('view');

        return $this->instance;
    }
    public function findWithRelations($id, $relations = ['categories'])
    {
        $this->find($id);

        $this->instance = $this->instance->load($relations);
        
        // $this->authorize('view');
        return $this->instance;
    }
    public function createHasCategory(array $data, array $category){

        $this->instance = $this->create($data);

        $this->syncCategory($this->instance, $category);
        return $this->instance;
    }
    public function update($id, array $data)
    {
        $this->instance = $this->find($id);
        
        if ($this->instance) {
            $this->instance->update($data);
            return $this->instance;
        }

        return false;
    }
    public function updateHasCategory($id, array $data, array $category){
        
        $this->update($id, $data);

        $this->syncCategory($this->instance, $category);
        
        return $this->instance;
    }
    public function delete($id)
    {
        $this->instance = $this->find($id);
        
        if ($this->instance) {
            $this->instance->delete();

            return true;
        }

        return false;
    }

    public function deleteBy($field, $value, $compare = '=')
    {
        $this->instance = $this->model->where($field, $compare, $value);
        

        return $this->instance->delete();
    }
    
    public function syncCategory($post, $category) {
        return $post->categories()->sync($category);
    }

    public function getQueryBuilderSelectWithRelations(array $select = [], $relations = ['categories']){

        $this->getQueryBuilder();

        return $this->instance->with($relations);

    }
}