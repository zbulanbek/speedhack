<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicBlock extends Model
{
    use HasFactory;

    public function questions(){
        return $this->hasMany(Question::class, 'topic_block_id', 'id')->select(['id','task_id','question', 'options']);
    }

    public function all_questions(){
        return $this->hasMany(Question::class);
    }
}
