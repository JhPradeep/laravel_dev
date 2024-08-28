<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Todos;

class Todo extends Component
{
    public $todos = [];
    public $task_name="";
    
    protected $listeners = ['todoRemoved' => 'delete'];

    public function render()
    {
        $this->todos = Todos::all();
        return view('livewire.todo');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->task_name = '';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function add_todo()
    {
        $validatedEntry = $this->validate([
            'task_name' => 'required'
        ]);
        
        $existingTask = Todos::where('task_name', $this->task_name)->first();

        if ($existingTask) {
            session()->flash('message', 'Todo Already Exist.');
            
        }else{

        Todos::create($validatedEntry);
  
        session()->flash('message', 'Todo Created Successfully.');
  
        $this->resetInputFields();
      }
    }

    public function update($id)
    {
  
        $todo = Todos::find($id);
        $todo->task_state = 1;
        $todo->save();
  
        session()->flash('message', 'Todos Updated Successfully.');
    }

   
    public function delete($id)
    {
        Todos::find($id)->delete();
        session()->flash('message', 'Todos Deleted Successfully.');
    }
}
