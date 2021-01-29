<html>
<head>
   <meta charset="utf-8">
   <title>Banco Patito</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   <script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
    </script>
    <style>
           html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
     </style>
</head>
<body>

<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Ingresar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Banco Patito, su economia tan fiable como nuestro nombre ;) 
                </div>

   <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <h3>Sistema de turnos Banco Patito</h3>
           </div>
           <div class="modal-body">
              <h4>Por favor presione el boton para poder tomar un turno</h4>
              Gracias por su preferencia, en un momento lo atenderemos, por favor espere su turno :).
       </div>
           <div class="modal-footer">
           <button href="" type="button" class="btn btn-primary">Tomar turno</button>
            <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>
</body>
<script type="text/javascript">
    

      window.addEventListener('load', function(){
      $('button.btn-primary').click(function(){
        getTurnos(this);
      });
    });

    function getTurnos(target){
      $.ajax({
  	    type: "POST",
  	    cache: false,
          url: 'turnos',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          beforeSend: function(){
          
  	    },
  	    error: function(xhr, status, error){
          $("#card-usuarios_rol .overlay").hide();
          var err = JSON.parse(xhr.responseText);
          alert(err.message);
  	    },
  	    success: function(x){
            alert("Te toca el turno " + x[0].id);
  	    }// /success
  	  });// /ajax
    }// /usuariosConRol

  </script>
</html>


