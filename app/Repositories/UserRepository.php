<?php
namespace App\Repositories;
use App\Models\User;
use Illuminate\Support\Collection;
use Auth;
class UserRepository extends BaseRepository {
   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    public function update($attributes)
    {
        Auth::user()->update($attributes);
    }
}