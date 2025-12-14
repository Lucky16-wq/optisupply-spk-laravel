<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    protected $fillable = ['name','type','weight'];

    public function values()
    {
        return $this->hasMany(Value::class, 'criterion_id');
    }
}
