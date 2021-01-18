<?php namespace App\Models;

use CodeIgniter\Model;

class ChatBotModel extends Model
{
    protected $table = 'chatbot';
    protected $primaryKey = 'id';

    protected $allowedFields = ['active'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}