<?php

namespace App\Admin\Controller;

use App\Core\Request;
use App\Core\Response;
use App\Admin\Model\Task;
use App\Util\DbHelper;

class TaskController
{
  private Request $request;
  private Response $response;

  public function __construct(Request $request, Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  public function insertTask()
  {
    // Example: Retrieving data from the request (assuming you have form fields)
    $taskData = [
      'task_title' => $this->request->post('taskTitle'),
      'task_details' => $this->request->post('taskDetails'),
      // ... other form fields
    ];

    // Instantiate Task model
    $task = new Task();

    // Set properties based on request data
    $task->set_task_title($taskData['task_title']);
    $task->set_task_details($taskData['task_details']);
    // ... set other properties

    // Insert into the database
    $success = $task->insert();

    if ($success) {
      echo "Task saved successfully!";
    } else {
      echo "Failed to save task. Please check the logs for details.";
    }
  }

}
