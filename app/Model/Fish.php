<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
	{
		//only fields filter
		protected $fillable = array('weight', 'bear_id');

		//initial table
		protected $table = 'fish';

		//relation
		public function bear()
		{
			return $this->belongsTo('Bear');
		}
	}
?>