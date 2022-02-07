<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function attributes()
    {
        return $this->hasMany(ContactsAttribute::class, 'contacts_id', 'id');
    }
}