<?php
namespace App\Services;

use App\Repositories\ProfileRepository;

class ProfileService {
	public function __construct(public ProfileRepository $repository) {}
	public function getUser($name)
	{
		return $this->repository->findByUsername($name);
	}
}