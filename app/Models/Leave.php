<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\EmployeeController;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Leave extends Model
{
    use HasFactory;
    protected $primaryKey = 'leaves_id';

    protected $fillable=['start_date', 'end_date', 'reason', 'employee_id'];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
}
