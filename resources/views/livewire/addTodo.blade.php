<form class="row">
   <div class="col-9">
        <div class="form-group">
            <label for="exampleFormControlInput1">Task Name:</label>
            <input type="text" 
                   class="form-control" 
                   id="exampleFormControlInput1" 
                   placeholder="Enter Task Name" 
                   wire:model="task_name"/>
            @error('task_name') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="col-3">
       <button wire:click.prevent="add_todo()" class="btn btn-success" style="margin-top:30px !important;">Create Todo</button>
    </div>
</form>
