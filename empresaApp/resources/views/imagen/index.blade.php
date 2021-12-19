@extends('layout')

@section('content')
<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="https://informatica.ieszaidinvergeles.org:10026/laraveles/empresaApp/resources/views/bxs-ghost.svg" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">App Empresa</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ url('/') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ url('empleados') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Tablas Empleados</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white  " href="{{ url('departamentos') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Tabla Departamentos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ url('puestos') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Tabla Puestos Trabajo</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active  bg-gradient-primary" href="{{ url('imagens') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">image</i>
            </div>
            <span class="nav-link-text ms-1">Tabla Imagenes Guardadas</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pagina</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tabla</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Tabla Departamentos</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-3 me-md-0 me-sm-3" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3" style="display: flex; align-items: baseline; flex-direction: row; justify-content: space-between;">
                <h6 class="text-white text-capitalize ps-3">Tabla Departamentos</h6>
                <a class="btn bg-gradient-info" style="margin-bottom:0; margin-right:25px;" href="{{ url('imagens/create') }}" type="button">Crear imagen</a>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre Imagen</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">extensión</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 alert-info border-radius-lg text-white">Imagen</th>
                      <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($imagenes as $imagen)
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-0">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$imagen->id}}</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <h6 class="font-weight-bold mb-0 text-sm">{{$imagen->nombre}}</h6>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <h6 class="font-weight-bold mb-0 text-sm">{{$imagen->extension}}</h6>
                      </td>
                      <td class="text-center">
                        <img src="{{$imagen->path}}" width="40px">
                      </td>
                      <td class="align-middle text-center text-sm">
                      </td>
                      <td class="align-middle">
                        <a href="{{ route('imagens.edit', $imagen->id)}}" class="font-weight-bold btn-success btn-sm" style="padding:4px 10px;" data-original-title="Edit user">
                          Edit
                        </a>
                        <form id="{{'form' . $imagen->id}}" action="{{ route('imagens.destroy', $imagen->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="font-weight-bold btn-danger btn-sm" onclick="javascript:document.getElementById('{{'form' . $imagen->id}}').submit()" style="padding:4px 10px;">Borrar</a>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
@endsection