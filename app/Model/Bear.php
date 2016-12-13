<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bear extends Model
	{
		//only fields filter
		protected $fillable = array('name', 'type', 'danger_level');
		
		//bear -> one fish
		public function fish()
		{
			return $this->hasOne('App\Model\Fish'); // full url to model relation
		}

		//bear-> many trees
		public function trees()
		{
			return $this->hasMany('App\Model\Tree'); // full url to model relation
		}

		//bear-> belong to many picnic
		public function picnics()
		{
			// return $this->belongsToMany('Picnic', 'bears_picnics', 'bear_id', 'picnic_id');
			return $this->belongsToMany('App\Model\Picnic', 'bears_picnics', 'bear_id', 'picnic_id'); // need full url to model relation
		}
	} 
?>