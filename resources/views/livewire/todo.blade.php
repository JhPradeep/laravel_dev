<div>
  
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
  
    
    @include('livewire.addTodo')
    
    <div class="w-100 text-center"> <button type="button" class="btn btn-primary" onclick="onToggle()">Show All</button></div>
    <table class="table table-bordered table-striped table-hover mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tasks</th>
                <th>Status</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $todo)
            <tr class="{{$todo->task_state === 1 ? "d-none completed":"not-completed"}}">
                <td>{{ $todo->id }}</td>
                <td>{{ $todo->task_name }}</td>
                <td>{{ $todo->task_state === 1 ? "Completed":"In Completed" }}</td>
                <td>
                    
                    <button wire:click="update({{ $todo->id }})" class="btn btn-light btn-sm" style="visibility:{{$todo->task_state === 1?"hidden":"visible"}}"> <i class="fas fa-check-circle text-success"></i></button>
                   
                    <button onclick="onConfirmDelete({{ $todo->id }})" class="btn btn-danger btn-sm" 
                    title="Delete">  <i class="fas fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>