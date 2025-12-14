<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    protected $fillable = ['name','description'];

    public function values()
    {
        return $this->hasMany(Value::class, 'alternative_id');
    }
}
