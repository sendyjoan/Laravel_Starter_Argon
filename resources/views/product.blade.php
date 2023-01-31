@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0 text-center">
            <h6>Product Table</h6>
          </div>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-input">Add Product</button>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stock</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if($products->count() == 0)
                    <tr class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      <td colspan=6>
                        <label for="">No data available</label>
                      </td>
                    </tr>
                  @endif
                  @foreach ($products as $item)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$item->product_name}}</h6>
                          <p class="text-xs text-secondary mb-0">{{$item->category->category_name}}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$item->stock}}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-success">{{$item->price}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$item->created_at}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$item->updated_at}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <button class="btn btn-icon btn-2 btn-info btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modal-view-{{$item->id}}">
                        <span class="btn-inner--icon"><i class="ni ni-bulb-61"></i></span>
                      </button>
                      <button class="btn btn-icon btn-2 btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$item->id}}">
                        <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
                      </button>
                      <button class="btn btn-icon btn-2 btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$item->id}}">
                        <span class="btn-inner--icon"><i class="ni ni-basket"></i></span>
                      </button>
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
  {{-- Modal Input --}}
  <div class="col-md-4">
    <div class="modal fade" id="modal-input" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Input Form Product</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form text-left" method="post" action="{{ route('products.store') }}">
              @csrf
              <label>Product Name</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="product_name" placeholder="Product Name" aria-label="Product Name" aria-describedby="product-name-addon">
              </div>  
              <label>Stock Product</label>
              <div class="input-group mb-3">
                <input type="number" class="form-control" name="stock" placeholder="Stock Product" aria-label="Stock Product" aria-describedby="stock-product-addon">
              </div>  
              <label>Price Product</label>
              <div class="input-group mb-3">
                <input type="number" class="form-control" name="price" placeholder="Price Product" aria-label="Price Product" aria-describedby="price-product-addon">
              </div>  
              <label>Category Product</label>
              <div class="input-group mb-3">
                <select name="category" class="form-select" aria-label="Category Product">
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->category_name}}</option>
                  @endforeach
                </select>
              </div>  
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Add Product</button>
          </form>
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Modal View Detail --}}
  @foreach ($products as $view)
  <div class="col-md-4">
    <div class="modal fade" id="modal-view-{{$view->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Detail Product</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <h5>{{$view->product_name}}</h5>
            </div>
            <p>Stock : <b>{{$view->stock}}</b></p>
            <p>Price : <b>{{$view->price}}</b></p>
            <p>Category : <b>{{$view->category->category_name}}</b></p>
            <p>Created At : <b>{{$view->created_at}}</b></p>
            <p>Updated At : <b>{{$view->updated_at}}</b></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @foreach ($products as $delete)
  <div class="col-md-4">
    <div class="modal fade" id="modal-delete-{{$delete->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
              <i class="ni ni-bell-55 ni-3x"></i>
              <h4 class="text-gradient text-danger mt-4">Are you sure to delete <br><b>{{$delete->product_name}}</b></h4>
              <p>The data you have deleted cannot be restored in any way.</p>
            </div>
          </div>
          <div class="modal-footer">
            <form action="{{ route('products.destroy',['product'=>$delete->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn bg-gradient-danger btn-white">Ok, I'm sure!</button>
            </form>
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @foreach ($products as $edit)
  <div class="col-md-4">
    <div class="modal fade" id="modal-edit-{{ $edit->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Form Edit Product</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ route('products.update', $edit->id) }}" id="myForm">
              @csrf
              @method('PUT')
              <label>Product Name</label>
              <div class="input-group mb-3">
                <input type="text" value="{{$edit->product_name}}" class="form-control" name="product_name" placeholder="Product Name" aria-label="Product Name" aria-describedby="product-name-addon">
              </div>  
              <label>Stock Product</label>
              <div class="input-group mb-3">
                <input type="number" value="{{$edit->stock}}" class="form-control" name="stock" placeholder="Stock Product" aria-label="Stock Product" aria-describedby="stock-product-addon">
              </div>  
              <label>Price Product</label>
              <div class="input-group mb-3">
                <input type="number" value="{{$edit->price}}" class="form-control" name="price" placeholder="Price Product" aria-label="Price Product" aria-describedby="price-product-addon">
              </div>  
              <label>Category Product</label>
              <div class="input-group mb-3">
                <select name="category" class="form-select" aria-label="Category Product">
                  @foreach ($categories as $cat)
                  <option value="{{$cat->id}}" {{ $edit->category_id == $cat->id ? 'selected' : ''}}>{{$cat->category_name}}</option>
                  @endforeach
                </select>
              </div>  
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Edit Product</button>
          </form>
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection