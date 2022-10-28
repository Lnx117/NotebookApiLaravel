<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     title="Contacts",
 *     description="Contacts model",
 * )
 */
class Contacts extends Model
{
    use HasFactory;
    protected $fillable = [
        'surname',
        'name',
        'middle_name',
        'company',
        'phone',
        'email',
        'birthday',
        'photo_path',
        'created_at',
        'updated_at'
    ];
}
