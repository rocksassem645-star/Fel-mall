@extends("layouts.app")

@section("content")

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow border-0 rounded-4">

                {{-- Card Header --}}
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center rounded-top-4">
                    <h4 class="mb-0">
                        <i class="fa-solid fa-box me-2"></i>
                        Product Details
                    </h4>
                    <a href="{{ route('home') }}" class="btn btn-success">
                        <i class="fa-solid fa-house-user me-1"></i>
                        Home
                    </a>
                </div>

                {{-- Card Body --}}
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">

                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title EN</th>
                                    <th>Title AR</th>
                                    <th>Title RU</th>
                                    <th>Description EN</th>
                                    <th>Description AR</th>
                                    <th>Description RU</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="fw-bold">{{ $result->id }}</td>
                                    <td>
                                        <img src="{{ asset('img/Product/' . $result->prod_img) }}"
                                             alt="Product Image"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    </td>
                                    <td>{{ $result->title_en }}</td>
                                    <td>{{ $result->title_ar }}</td>
                                    <td>{{ $result->title_ru }}</td>
                                    <td>{{ $result->description_en }}</td>
                                    <td>{{ $result->description_ar }}</td>
                                    <td>{{ $result->description_ru }}</td>
                                    <td class="text-success fw-bold">${{ $result->price }}</td>
                                    <td>{{ $result->quantity }}</td>
                                    <td>
                                        <a href="{{ route('home') }}" class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-house-user"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection