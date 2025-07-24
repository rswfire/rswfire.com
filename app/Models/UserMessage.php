<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    use HasUlids;
    use App\Http\Controllers\UserMessageController;

    protected $table = "transmissions";
    protected $primaryKey = "transmission_id";


Route::get('/contact', [ContactMessageController::class, 'create']);
Route::post('/contact', [ContactMessageController::class, 'store']);
}
