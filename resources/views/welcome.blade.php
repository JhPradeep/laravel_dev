<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        
        @livewireStyles
    </head>
    <body class="antialiased">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel Livewire Todo App</h2>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @livewire('todo')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
     <script>
      function onConfirmDelete(id){
         if(confirm('Are u sure to perform this action ?')){
            Livewire.emit('todoRemoved',id);
         }
      }
      
      function onToggle(){
        const hiddenRows =  document.querySelectorAll('.completed');
        Array.from(hiddenRows).forEach(el=>el.classList.toggle('d-none'));
      }
     </script>
    </body>
   
</html>
