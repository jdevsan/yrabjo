<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;






class Pokemon extends Model
{
    protected $fillable = [
        'name','weight','height','type_id','evolves'
    ];





    public function tipo(){
        return $this->belongsTo(Type::class);
    }
}
