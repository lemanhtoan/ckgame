<?php 
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
	{
		//initial table
		protected $table = 'products';
		public $timestamps = false;
		protected $guarded = array();

		//relation
		public function cate()
		{
			return $this->belongsTo('App\Model\Cate');
		}
	}
?>