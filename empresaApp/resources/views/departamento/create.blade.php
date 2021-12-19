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
                  <h4 class="text-white font-weight-bolder text-center mt-1 mb-0">Creación de Departamento</h4>
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
                <form method="post" action="{{ route('departamentos.store') }}">
                  @csrf
                  <div class="form-group input-group input-group-outline mb-3">
                    <label for="name" class="form-label">Nombre</label> 
                    <input type="text" class="form-control" name="nombredepartamento"/> 
                  </div>
                  <div class="form-group input-group input-group-outline mb-3">
                      <label for="name" class="form-label">Localización</label> 
                      <input type="text" class="form-control" name="localizacion"/> 
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-warning w-100 mb-0 ">Crear Departamento</button>
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
