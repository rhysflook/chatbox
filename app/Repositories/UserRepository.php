<?php
namespace App\Repositories;

use App\Models\Friendship;
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

    public function search($field, $value)
    {
        return $this->model->where($field, 'like', "%$value%");
    }

    public function searchNonFriendUsers($username)
    {
        $id = Auth::id();

        $subquery = User::select('users.id')->leftJoin('friendships as f', function ($join) {
            $join->on('f.recipient_id', '=', 'users.id')->orOn('f.sender_id', '=', 'users.id');
        })->where(['f.recipient_id' =>  $id])->orWhere(['f.sender_id' => $id]);

        return $this->search('username', $username)
            ->where('id', '<>', Auth::id())
            ->whereNotIn('id', $subquery)->groupBy('users.id')
            ->get();
    }
}