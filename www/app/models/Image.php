<?php

class Image extends Eloquent {

	protected $table = 'image';
	protected $primaryKey = 'image_id';

	public function getDates() {
    	return array('posted_at', 'created_at', 'updated_at');
	}

	public function source() {
        return $this->belongsTo('Source', 'source_id', 'source_id');
    }

    public function location() {
        return $this->belongsTo('Location', 'location_id', 'location_id');
    }

}
