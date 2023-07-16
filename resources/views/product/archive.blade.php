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


                            <a href="{{ route('product.index') }}" type="button" class="btn btn-info">Show Product</a>
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


                                            <a href="{{ route('product.restore', $product->id) }}" type="submit"
                                                class="btn btn-primary">Restore</a>

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

                                    @if($products->currentPage() < 1) <li class="page-item"><span class="page-link"
                                            href="#">{{ $products->currentPage()
                                            }}</span>
                                        </li>
                                        @endif

                                        @if ($products->nextPageUrl())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $products->nextPageUrl() }}"
                                                aria-label="Next">
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




@endsection