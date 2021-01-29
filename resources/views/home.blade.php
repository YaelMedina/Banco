@extends('layouts.app')

@section('content')
<div class="container">

  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif

  <div class="row">
    <div class="col-md-3">

      <div class="card">
        <div class="card-header">Mis roles asignados</div>
          <div class="card-body p-2">
            @foreach(Auth::user()->roles as $rol)
              <span class="badge badge-primary"><i class="fa fa-check"></i> {{ $rol->name }}</span>
            @endforeach
          </div><!-- /.card-body -->
        </div><!-- /.card -->

      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="modal-footer">
           <button href="" type="button" class="btn btn-primary">Presione para atender el siguiente turno</button>
            
           </div>
</div><!-- /.container -->

<script type="text/javascript">
    

      window.addEventListener('load', function(){
      $('button.btn-primary').click(function(){
        getTurnosCajero(this);
      });
    });

    function getTurnosCajero(target){
      $.ajax({
  	    type: "POST",
  	    cache: false,
          url: 'turnos_cajero/' + {{ $rol->id }},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          beforeSend: function(){
          
  	    },
  	    error: function(xhr, status, error){
          $("#card-usuarios_rol .overlay").hide();
          var err = JSON.parse(xhr.responseText);
          alert(err.message);
  	    },
  	    success: function(x){
            alert("Le toca atender el turno " + x[0].id);
  	    }// /success
  	  });// /ajax
    }// /usuariosConRol

  </script>
@endsection
