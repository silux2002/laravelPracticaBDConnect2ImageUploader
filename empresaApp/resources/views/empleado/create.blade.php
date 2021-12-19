@extends('layout') 
 
@section('content') 
<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-1 mb-0">Creación de Empleado</h4>
                </div>
              </div>
              <div class="card-body">
                @if ($errors->any()) 
                  <div class="alert alert-danger"> 
                      <ul> 
                          @foreach ($errors->all() as $error) 
                              <li>{{ $error }}</li> 
                          @endforeach 
                      </ul> 
                  </div><br/>
                @endif 
                <form method="post" action="{{ route('empleados.store') }}">
                  @csrf
                  <div class="form-group input-group input-group-outline mb-3">
                    <label for="name" class="form-label">Nombre</label> 
                    <input type="text" class="form-control" name="nombre"/> 
                  </div>
                  <div class="form-group input-group input-group-outline mb-3">
                      <label for="name" class="form-label">Apellido</label> 
                      <input type="text" class="form-control" name="apellidos"/> 
                  </div>
                  <div class="form-group input-group input-group-outline mb-3"> 
                      <label for="email" class="form-label">Telefono</label> 
                      <input type="tel" class="form-control" name="telefono"/> 
                  </div>
                  <div class="form-group input-group input-group-outline mb-3"> 
                      <label for="email" class="form-label">Email</label> 
                      <input type="email" class="form-control" name="email"/> 
                  </div> 
                  <div class="input-group input-group-static my-3"> 
                      <label for="date" class="input-group">Fecha Contratración</label> <br>
                      <input type="date" class="form-control" value="" name="fecha_contratacion"/> 
                  </div> 
                  <div class="input-group input-group-static mb-4">
                      <label for="phone" class="ms-0">Departamento</label> 
                      <select name="departamento_id" class="form-control">
                          @foreach(\App\Models\Departamento::all() as $d)
                          <option value="{{$d->id}}" name="departamento_id">{{$d->nombredepartamento}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="input-group input-group-static mb-4">
                      <label for="phone" class="ms-0">Puesto trabajo</label> 
                      <select name="puesto_trabajo_id" class="form-control">
                          @foreach(\App\Models\PuestoTrabajo::all() as $d)
                          <option value="{{$d->id}}" name="puesto_trabajo_id">{{$d->nombrepuesto}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-warning w-100 mb-0 ">Crear</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
