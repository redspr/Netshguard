<?php namespace App\Models;

use CodeIgniter\Model;

class AttackLogsModel extends Model
{
    protected $table = 'attacklogs';
    protected $primaryKey = 'id';

    protected $allowedFields = ['active'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}