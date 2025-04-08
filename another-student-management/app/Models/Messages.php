<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{

    /** @use HasFactory<\Database\Factories\MessagesFactory> */
    use HasFactory;

    protected $fillable = [
        'sender_uuid',
        'recipient_uuid',
        'message'
    ];

    // Relationship to the sender
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_uuid', 'uuid');
    }

    // Relationship to the recipient
    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_uuid', 'uuid');
    }
}
