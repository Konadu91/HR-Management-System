<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


use App\Http\Controllers\LeaveController;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';
    protected $guarded=[];


         
    public function leaves(): HasMany
    {
        return $this->hasMany(Leave::class, 'employee_id', 'employee_id');
    }


    
}
