<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description"];

    protected static function boot(){
        parent::boot();
        self::creating(function ($table){
            if ( ! app()->runningInConsole()){
                $table->user_id = auth()->id();
            }
        });

    }

    public function user() {
        return $this->BelongsTo(User::class);
        echo "asd";
    }
}
