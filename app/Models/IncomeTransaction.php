<?php

namespace App\Models;

use App\AuditableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeTransaction extends Model
{
    /** @use HasFactory<\Database\Factories\IncomeTransactionFactory> */
    use AuditableTrait,HasFactory;

    protected $fillable = ['amount', 'description'];
}
