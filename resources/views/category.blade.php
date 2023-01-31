@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0 text-center">
            <h6>Category Table</h6>
          </div>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-input">Add Category</button>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edited Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $category->category_name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $category->created_at}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $category->updated_at}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <button class="btn btn-icon btn-2 btn-info btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modal-view-{{$category->id}}">
                        <span class="btn-inner--icon"><i class="ni ni-bulb-61"></i></span>
                      </button>
                      <button class="btn btn-icon btn-2 btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-{{$category->id}}">
                        <span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
                      </button>
                      <button class="btn btn-icon btn-2 btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$category->id}}">
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
  {{-- Modal Start --}}
  {{-- Modal Input --}}
  <div class="col-md-4">
    <div class="modal fade" id="modal-input" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Input Form Category</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form text-left" method="post" action="{{ route('categories.store') }}">
              @csrf
              <label>Category Name</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="category_name" placeholder="Category Name" aria-label="Category Name" aria-describedby="category-name-addon">
              </div>  
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Add Category</button>
          </form>
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Modal View Detail --}}
  @foreach ($categories as $view)
  <div class="col-md-4">
    <div class="modal fade" id="modal-view-{{$view->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Detail Category</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <h5>{{$view->category_name}}</h5>
            </div>
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
  {{-- Modal Delete --}}
  @foreach ($categories as $delete)
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
              <h4 class="text-gradient text-danger mt-4">Are you sure to delete <br> <b>{{$delete->category_name}}</b></h4>
              <p>The data you have deleted cannot be restored in any way.</p>
            </div>
          </div>
          <div class="modal-footer">
            <form action="{{ route('categories.destroy',['category'=>$delete->id]) }}" method="POST">
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
  {{-- Modal Edit --}}
  @foreach ($categories as $edit)
  <div class="col-md-4">
    <div class="modal fade" id="modal-edit-{{ $edit->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Form Edit Category</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ route('categories.update', $edit->id) }}" id="myForm">
              @csrf
              @method('PUT')
              <label>Category Name</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="category_name" placeholder="Category Name" aria-label="Category Name" aria-describedby="category-name-addon" value="{{$edit->category_name}}">
              </div>  
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-primary">Edit Category</button>
          </form>
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection