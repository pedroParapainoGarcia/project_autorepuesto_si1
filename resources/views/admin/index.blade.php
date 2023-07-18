@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>PAQUETES</h1>
@stop

@section('content')

<head>
    <!-- Agrega el enlace a la hoja de estilos de Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4 col-xl-4">

                            <div class="card bg-c-blue order-card">
                                <div class="card-block">
                                    <h5>Usuarios</h5>
                                    @php
                                    use App\Models\User;
                                    $cant_usuarios = User::count();
                                    @endphp
                                    <h2 class="text-right"><i
                                            class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                    <p class="m-b-0 text-right"><a href="admin/usuarios" class="text-white">Ver más</a>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 col-xl-4">
                            <div class="card bg-c-pink order-card">
                                <div class="card-block">
                                    <h5>Repuestos</h5>
                                    @php
                                    use App\Models\Repuesto;
                                    $cant_repuestos = Repuesto::count();
                                    @endphp
                                    <h2 class="text-right"><i
                                            class="fa fa-box f-left"></i><span>{{$cant_repuestos}}</span></h2>
                                    <p class="m-b-0 text-right"><a href="admin/repuestos" class="text-white">Ver más</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-4">
                            <div class="card bg-c-purple order-card">
                                <div class="card-block">
                                    <h5>Proveedores</h5>
                                    @php
                                    use App\Models\Proveedore;
                                    $cant_proveedores = Proveedore::count();
                                    @endphp
                                    <h2 class="text-right"><i
                                            class="fa fa-users f-left"></i><span>{{$cant_proveedores}}</span></h2>
                                    <p class="m-b-0 text-right"><a href="admin/proveedores" class="text-white">Ver más</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-4">
                            <div class="card bg-c-orange order-card">
                                <div class="card-block">
                                    <h5>Clientes</h5>
                                    @php
                                    use App\Models\Cliente;
                                    $cant_clientes = Cliente::count();
                                    @endphp
                                    <h2 class="text-right"><i
                                            class="fas fa-user-tag f-left"></i><span>{{$cant_clientes}}</span></h2>
                                    <p class="m-b-0 text-right"><a href="admin/clientes" class="text-white">Ver más</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-md-4 col-xl-4">
                            <div class="card bg-c-green order-card">
                                <div class="card-block">
                                    <h5>Compra a Proveedores</h5>
                                    @php
                                    use App\Models\Notadecompra;
                                    $cant_compras = Notadecompra::count();
                                    @endphp
                                    <h2 class="text-right"><i
                                            class="fa fa-cart-plus f-left"></i><span>{{$cant_compras}}</span></h2>
                                    <p class="m-b-0 text-right"><a href="admin/notadecompras" class="text-white">Ver más</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-4">
                            <div class="card bg-c-yellow order-card">
                                <div class="card-block">
                                    <h5>Ventas a Clientes</h5>
                                    @php
                                    use App\Models\Notadeventa;
                                    $cant_ventas = Notadeventa::count();
                                    @endphp
                                    <h2 class="text-right"><i
                                            class="fa fa-cart-plus f-left"></i><span>{{$cant_ventas}}</span></h2>
                                    <p class="m-b-0 text-right"><a href="admin/notadeventas" class="text-white">Ver más</a></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop