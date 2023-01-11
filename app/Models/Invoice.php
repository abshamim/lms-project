<?php

namespace App\Models;

use App\Models\InvoiceItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    public function invItems(){
        return $this->hasMany(InvoiceItem::class);
    }
}