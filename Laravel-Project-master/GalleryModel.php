<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model {

    protected $table = "gallery";
    protected $fillable = ["title","date","picture"];

}
