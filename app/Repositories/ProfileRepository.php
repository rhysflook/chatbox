<?php
namespace App\Repositories;

use App\Models\User;

class ProfileRepository extends BaseRepository {
	public function __construct(User $model) {
		parent::__construct($model);
	}

	public function findByUsername($name)
	{
		return $this->model->where('username', $name)->first();
	}
}