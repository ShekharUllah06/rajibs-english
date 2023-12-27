<?php

namespace App\Admin\Model;

use App\Core\Database;
use App\Util\DbHelper;


class Task
{
    private $id;
    private $task_title;
    private $task_details;
    private $task_date;
    private $module;
    private $task_type;
    private $user_id='02-2067';

    // Getter and Setter for 'id'
    public function set_id($id)
    {
      $this->id = $id;
    }

    public function set_task_title($task_title)
    {
      $this->task_title = $task_title;
    }

    public function set_task_details($task_details)
    {
      $this->task_details = $task_details;
    }

    public function set_task_date($task_date)
    {
      $this->task_date = $task_date;
    }

    public function set_module($module)
    {
      $this->module = $module;
    }

    public function set_task_type($task_type)
    {
      $this->task_type = $task_type;
    }

    public function set_user_id($user_id)
    {
      $this->user_id = $user_id;
    }

    // Getter methods
    public function get_id()
    {
      return $this->id;
    }

    public function get_task_title()
    {
      return $this->task_title;
    }

    public function get_task_details()
    {
      return $this->task_details;
    }

    public function get_task_date()
    {
      return $this->task_date;
    }

    public function get_module()
    {
      return $this->module;
    }

    public function get_task_type()
    {
      return $this->task_type;
    }

    public function get_user_id()
    {
      return $this->user_id;
    }

    public function insert()
    {
      try {
        $db = Database::getInstance();
        $pdo = $db->getPDO();
        $success = DbHelper::insert($pdo, $this, 'daily_task_copy1');
        return $success;
      } catch (\Exception $e) {
        // Log the error or handle it accordingly
        // error_log("Task insertion error: " . $e->getMessage());
        echo("Task insertion error: " . $e->getMessage());
        return false;
      }
    }

}
