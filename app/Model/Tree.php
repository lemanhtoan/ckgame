<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tree extends Model
	{
		protected $fillable = array('type', 'age', 'bear_id');

		public function bear()
		{
			return $this->belongsTo('Bear');
		}		
	}
?>