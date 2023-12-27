<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">

        <div class="card-body">
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-task">
            Add Task
          </button>
        </div>
        <div class="modal fade" id="modal-task">
          <form id="taskForm" action="">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Task Details</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card card-primary">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="taskTitle">Task Title</label>
                        <input type="text" name="taskTitle" class="form-control" id="taskTitle" placeholder="Enter task title" required>
                      </div>
                      <div class="form-group">
                        <label for="taskDetails">Task Details</label>
                        <textarea name="taskDetails" class="form-control" id="taskDetails" placeholder="Enter task details"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="taskDate">Date</label>
                        <input type="date" name="taskDate" class="form-control" id="taskDate" required>
                      </div>
                      <div class="form-group">
                        <label for="taskModule">Module</label>
                        <select name="taskModule" class="form-control" id="taskModule">
                          <!-- Add your module options here -->
                          <option value="NOC">NOC</option>
                          <option value="ONM">ONM</option>
                          <!-- Add more options as needed -->
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="taskType">Task Type</label>
                        <select name="taskType" class="form-control" id="taskType">
                          <!-- Add your task type options here -->
                          <option value="Feature Development">Feature Development</option>
                          <option value="Feature Enhancement">Feature Enhancement</option>
                          <option value="Bug Fixing">Bug Fixing</option>
                          <option value="Support">Support</option>
                          <!-- Add more options as needed -->
                        </select>
                      </div>
                    </div>

                  </div>
                  <!-- /.card -->
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </form>
        </div>
        <!-- jquery validation -->

      </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<script>
  document.getElementById('taskDate').valueAsDate = new Date();

  $(document).ready(function() {
    // Initialize form validation
    $('#taskForm').validate({
      rules: {
        taskTitle: {
          required: true
        },
        taskDate: {
          required: true
        }
        // Add rules for other fields as needed
      },
      messages: {
        taskTitle: {
          required: "Please enter a task title"
        },
        taskDate: {
          required: "Please select a date"
        }
        // Add custom error messages for other fields as needed
      },
      errorPlacement: function(error, element) {
        // Customize the placement of error messages if needed
        error.insertAfter(element);
      }
    });

    $('#saveChanges').on('click', function(e) {
      e.preventDefault();

      // Check if the form is valid before making the AJAX call
      if ($('#taskForm').valid()) {
        $.ajax({
          type: 'POST',
          url: 'insertTask',
          data: $('#taskForm').serialize(),
          success: function(response) {
            console.log(response);
            $('#modal-task').modal('hide');
          },
          error: function(error) {
            console.error(error);
          }
        });
      }
    });
  });
</script>