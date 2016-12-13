<?php 
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
	{
		//initial table
		protected $table = 'cates';
		public $timestamps = false;
		protected $guarded = array();

		//relation
		public function products()
		{
			return $this->hasMany('App\Model\Product');
		}
	}
?>