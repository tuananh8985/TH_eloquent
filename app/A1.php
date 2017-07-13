<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class A1 extends Model
{
    protected $table = 'a1s';

	public function testnhe()
	{

		return $this->hasManyThrough('App\C1', 'App\B1', 'a_id', 'b_id', 'id');
	}



}
