<?php namespace App\Models;

use CodeIgniter\Model;

class BlacklistModel extends Model
{
    protected $table = 'blacklist';
    protected $primaryKey = 'id';

    protected $allowedFields = ['active','uid','aid','ip','location'];


    protected $useTimestamps = true;
    protected $createdField = 'c_time';
    protected $updatedField = 'last_updated';
}