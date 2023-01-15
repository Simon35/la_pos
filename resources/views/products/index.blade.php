@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float:left; color:blueviolet">ADD a Product</h4>
                        <a href="{{ route('products-add')}}" style="float: right;" class="btn btn-secondary" data-toggle="modal" data-target="#productModal">
                            <i class="fa fa-plus"></i> ADD a new Product</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Stock (Alert)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key=>$product)

                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $product->product_name}}</td>
                                    <td>{{ $product->brand}}</td>
                                    <td>{{ number_format($product->price,2) }}</td>
                                    <td>{{ $product->qty}}</td>
                                    <td>@if ($product->alert_stock <= 25) <span class="badge badge-danger">Stock < 5</span>
                                                @else <span class="badge badge-primary">{{$product->alert_stock}}</span>
                                                @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$product->id}}">
                                                <i class="fas fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$product->id}}">
                                                <i class="fas fa-trash"></i> Delete

                                                </svg></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"></div>
                    <h4>Search product</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal of add product -->
<div class="modal right fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New product</h5>
                <button type="button" class="close" data-hidden="true" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('products-store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Brand</label>
                        <input type="text" name="brand" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alert Stock</label>
                        <input type="number" name="alert_stock" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label><i class="fa fa-phone"></i>
                        <input type="number" name="price" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" name="qty" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="texte" name="description" cols="20" rows="2" id="" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">Save product</button>
                    </div>
                </form>
            </div>
            <!--            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<!-- Modal of edit product -->
<div class="modal right fade" id="editModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
                <button type="button" class="close" data-hidden="true" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{$product->id}}
            </div>
            <div class="modal-body">
                <form action="{{url('products-update', $product->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="product_name" value="{{$product->product_name}}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="brand" value="{{$product->brand}}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" value="{{$product->price}}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" name="qty" value="{{$product->qty}}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alert stock</label>
                        <input type="number" name="alert_stock" value="{{$product->alert_stock}}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description" cols="15" rows="2" value="{{$product->description}}" id="" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning btn-block">Update product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal of delete product -->
<div class="modal right fade" id="deleteModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
                <button type="button" class="close" data-hidden="true" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{$product->id}}
            </div>
            <div class="modal-body">
                <form action="{{url('products-destroy', $product->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <p>Are you sure you want to delete {{$product->name}} ?</p>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$product->id}}">Delete product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .modal.right .modal-dialog {
        position: absolute;
        top: 0;
        right: 0;
        margin-right: 15vh;
        width: 400px;
    }

    .modal.fade:not(.in).right .modal-dialog {
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0);
    }
</style>

@endsection