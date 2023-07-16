@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <div class="btn-group float-end my-4" role="group">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#productCreate">Create</button>


                            <a href="{{ route('product.archive') }}" type="button" class="btn btn-warning">Show
                                Archive</a>
                        </div>
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#productDetail/{{ $product->id }}"> Details</button>
                                            <!-- Detail Modal Begin-->
                                            <div class="modal fade" id="productDetail/{{ $product->id }}" tabindex="-1"
                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                aria-labelledby="productEditLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="productEditLabel">{{
                                                                $product->name }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{-- details begin --}}
                                                            <div class="form">
                                                                <b>Product Name</b>
                                                                <span>{{ $product->name }}</span>
                                                            </div>
                                                            <div class="form">
                                                                <b>Product Price</b>
                                                                <span>{{ $product->price }}</span>
                                                            </div>
                                                            <div class="form">
                                                                <b>Product Description</b>
                                                                <span>{{ $product->description }}</span>
                                                            </div>
                                                            {{-- details end --}}
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Detail Modal End-->

                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#productEdit/{{ $product->id }}"> Edit</button>
                                            <!-- Edit Modal Begin-->
                                            <div class="modal fade" id="productEdit/{{ $product->id }}" tabindex="-1"
                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                aria-labelledby="productEditLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="productEditLabel">Edit Product
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{-- form begin --}}
                                                            <form action="{{ route('product.update', $product->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">
                                                                        Product Name
                                                                    </label>
                                                                    <input type="text" class="form-control" name="name"
                                                                        value="{{ $product->name }}">
                                                                    @error('name')
                                                                    <div class="form-text text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="price" class="form-label">
                                                                        Product Price
                                                                    </label>
                                                                    <input type="text" class="form-control" name="price"
                                                                        value="{{ $product->price }}">
                                                                    @error('price')
                                                                    <div class="form-text text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="description" class="form-label">
                                                                        Product Description
                                                                    </label>
                                                                    <textarea type="text" class="form-control"
                                                                        name="description">{{  $product->description }}</textarea>
                                                                    @error('description')
                                                                    <div class="form-text text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3 form-check">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        name="status" @if($product->status == 'active')
                                                                    checked @endif>
                                                                    <label class="form-check-label"
                                                                        for="status">Active</label>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary float-end">Submit</button>
                                                            </form>
                                                            {{-- form end --}}
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Modal End-->

                                            <form action="{{ route('product.delete', $product->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Product Available</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>

                        {{-- pagination begin --}}
                        <nav aria-label="Page navigation example">
                            <span class="text-gray-500">Total Product: {{ count($products) }}
                                <ul class="pagination float-end">
                                    @if ($products->previousPageUrl())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    @endif

                                    @if(count($products)) <li class="page-item"><span class="page-link" href="#">{{
                                            $products->currentPage()
                                            }}</span>
                                    </li>
                                    @endif

                                    @if ($products->nextPageUrl())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                        </nav>
                        {{-- pagination end --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal Begin-->
<div class="modal fade" id="productCreate" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="productCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productCreateLabel">Create Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- form begin --}}
                <form action="{{ route('product.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Product Name
                        </label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">
                            Product Price
                        </label>
                        <input type="text" class="form-control" name="price">
                        @error('price')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">
                            Product Description
                        </label>
                        <textarea type="text" class="form-control" name="description"></textarea>
                        @error('description')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me
                            out</label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </form>
                {{-- form end --}}
            </div>
            <!--
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        -->
        </div>
    </div>
</div>
<!-- Create Modal End-->


@endsection