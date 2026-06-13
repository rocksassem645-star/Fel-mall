@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">

            {{-- First Card --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

                    <div class="card-header bg-dark text-white py-3">
                        <div class="d-flex align-items-center justify-content-between">

                            <div class="fw-bold fs-5">
                                {{ __('language.Users') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $users->count() }}
                                </span>
                            </div>

                            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm px-3">
                                {{ __('language.Create new ?') }}
                            </a>

                        </div>
                    </div>

                    <div class="card-body bg-light">
                        @if (session('user_message'))
                            <h4 class="alert alert-success text-center">{{ session('user_message') }}</h4>
                        @endif
                        <div class="table-responsive">

                            <table class="table table-hover table-bordered align-middle text-center">

                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ __('language.ID') }}</th>
                                        <th>{{ __('language.Name') }}</th>
                                        <th>{{ __('language.Email') }}</th>
                                        <th>{{ __('language.Operation') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td class="fw-bold">{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>

                                            <td>
                                                <a href="{{ route('users.show', $item->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>

                                                <a href="{{ route('users.delete', $item->id) }}" class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>

                                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>
            </div>

            {{-- Second Card --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

                    <div class="card-header bg-dark text-white py-3">
                        <div class="d-flex align-items-center justify-content-between">

                            <div class="fw-bold fs-5">
                                {{ __('language.Categories') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $category->count() }}
                                </span>
                            </div>

                            <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm px-3">
                                {{ __('language.Create new ?') }}
                            </a>

                        </div>
                    </div>

                    <div class="card-body bg-light">
                        @if (session('message'))
                            <h4 class="alert alert-success text-center">{{ session('message') }}</h4>
                        @endif
                        <div class="table-responsive">

                            <table class="table table-hover table-bordered align-middle text-center">

                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ __('language.ID') }}</th>
                                        <th>{{ __('language.Image') }}</th>
                                        <th>{{ __('language.Title') }}</th>
                                        <th>{{ __('language.Description') }}</th>
                                        <th>{{ __('language.Operation') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($category as $item)
                                        <tr>
                                            <td class="fw-bold">{{ $item->id }}</td>
                                            <td>
                                                <img style="width:70px"
                                                    src="{{ asset('/img/Category/' . $item->cate_img) }}" alt="">
                                            </td>
                                            <td>{{ $item->banga }}</td>
                                            <td>{{ $item->dodo }}</td>

                                            <td>
                                                <a href="{{ route('categories.show', $item->id) }} "
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>

                                                <a href="{{ route('categories.delete', $item->id) }} "
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>

                                                <a href="{{ route('categories.edit', $item->id) }} "
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>
            </div>

            {{-- Third Card --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

                    <div class="card-header bg-dark text-white py-3">
                        <div class="d-flex align-items-center justify-content-between">

                            <div class="fw-bold fs-5">
                                {{ __('language.Products') }}
                                <span class="badge bg-primary ms-2">
                                    {{ $products->count() }}
                                </span>
                            </div>

                            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm px-3">
                                {{ __('language.Create new ?') }}
                            </a>

                        </div>
                    </div>

                    <div class="card-body bg-light">
                        @if (session('message'))
                            <h4 class="alert alert-success text-center">{{ session('message') }}</h4>
                        @endif
                        <div class="table-responsive">

                            <table class="table table-hover table-bordered align-middle text-center">

                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ __('language.ID') }}</th>
                                        <th>{{ __('language.Image') }}</th> 
                                        <th>{{ __('language.Title') }}</th>
                                        <th>{{ __('language.Description') }}</th>
                                        <th>{{ __('language.Price') }}</th>
                                        <th>{{ __('language.Operation') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td class="fw-bold">{{ $item->id }}</td>
                                            <td>
                                                <img style="width:70px"
                                                    src="{{ asset('/img/Product/' . $item->prod_img) }}" alt="">
                                            </td>
                                            <td>{{ $item->title_en }}</td>
                                            <td>{{ $item->description_en }}</td>
                                            <td class="text-success fw-bold">
                                                ${{ $item->price }}
                                            </td>

                                            <td>
                                                <a href="{{ route('products.show', $item->id) }} " class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>

                                                <a href="{{ route('products.delete', $item->id) }} "
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>

                                                <a href="{{ route('products.edit', $item->id) }} " class="btn btn-primary btn-sm">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>
            </div>

            {{-- Orders Card --}}
<div class="col-md-6 mb-4">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

        <div class="card-header bg-dark text-white py-3">
            <div class="d-flex align-items-center justify-content-between">

                <div class="fw-bold fs-5">
                    {{ __('language.Orders') }}
                    <span class="badge bg-primary ms-2">
                        {{ $orders->count() }}
                    </span>
                </div>

            </div>
        </div>

        <div class="card-body bg-light">
            @if (session('order_message'))
                <h4 class="alert alert-success text-center">{{ session('order_message') }}</h4>
            @endif
            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle text-center">

                    <thead class="table-dark">
                        <tr>
                            <th>{{ __('language.ID') }}</th>
                            <th>{{ __('language.User') }}</th>
                            <th>{{ __('language.Product') }}</th>
                            <th>{{ __('language.Quantity') }}</th>
                            <th>{{ __('language.Total Price') }}</th>
                            <th>{{ __('language.Status') }}</th>
                            <th>{{ __('language.Operation') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td class="fw-bold">{{ $item->id }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->product->title_en }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td class="text-success fw-bold">${{ $item->total_price }}</td>
                                <td>
                                    <span class="badge 
                                        @if($item->status == 'pending') bg-warning
                                        @elseif($item->status == 'confirmed') bg-primary
                                        @elseif($item->status == 'delivered') bg-success
                                        @elseif($item->status == 'cancelled') bg-danger
                                        @endif">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('orders.show', $item->id) }}"
                                        class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="{{ route('orders.delete', $item->id) }}"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
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
@endsection
