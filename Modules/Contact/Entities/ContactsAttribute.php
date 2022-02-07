<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactsAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'contacts_id', 'attribute', 'value',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contacts_id', 'id');
    }
}