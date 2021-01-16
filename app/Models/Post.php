<?php

namespace App\Models;

use Binaryk\LaravelRestify\Models\Concerns\HasActionLogs;
use Binaryk\LaravelRestify\Models\CreationAware;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @property string title
 * @property string description
 *
 * @package App\Models
 */
class Post extends Model implements CreationAware
{
    use HasFactory,
        HasActionLogs;

    protected $guarded = ['id'];

    protected $casts = [
        'is_active' => 'bool',
    ];

    public function activate()
    {
        $this->is_active = true;
        $this->save();

        return $this;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activePosts()
    {
        return [
            1, 2, 3
        ];
    }

    public static function createWithAttributes(array $attributes): ?self
    {
        return static::create($attributes);
    }
}
