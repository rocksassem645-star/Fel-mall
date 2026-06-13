@extends("layouts.app")


@section("content")
{{-- {{$result->id}} --}}

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="card shadow border-0 rounded-4">

                {{-- Card Header --}}
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center rounded-top-4">

                    <h4 class="mb-0">
                        <i class="fa-solid fa-user me-2"></i>
                        User Details
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>

                                    <td class="fw-bold">
                                        {{$result->id}}
                                    </td>

                                    <td>
                                        {{$result->name}}
                                    </td>

                                    <td>
                                        {{$result->email}}
                                    </td>

                                    <td>
                                        <span class="badge bg-primary px-3 py-2">
                                            {{$result->role}}
                                        </span>
                                    </td>

                                    <td>
                                        {{$result->created_at}}
                                    </td>

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