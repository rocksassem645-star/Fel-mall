@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card border-0 rounded-4 shadow-lg overflow-hidden">

                {{-- Fancy Header --}}
                <div class="card-header py-4 text-white"
                    style="background: linear-gradient(135deg, #f57c00, #e65100);">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div style="background:rgba(255,255,255,0.2); width:45px; height:45px; border-radius:12px; display:flex; align-items:center; justify-content:center;">
                                <i class="fa-solid fa-table-cells-large fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Category Details</h5>
                                <small style="opacity:0.85;">Viewing category #{{ $result->id }}</small>
                            </div>
                        </div>
                        <a href="{{ route('home') }}" class="btn fw-bold"
                            style="background:rgba(255,255,255,0.2); color:white; border-radius:8px; border: 1px solid rgba(255,255,255,0.4);">
                            <i class="fa-solid fa-house me-1"></i> Home
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center mb-0">
                            <thead style="background:#f5f7fa;">
                                <tr>
                                    <th class="py-3 text-muted">ID</th>
                                    <th class="py-3 text-muted">Image</th>
                                    <th class="py-3 text-muted">Title EN</th>
                                    <th class="py-3 text-muted">Title AR</th>
                                    <th class="py-3 text-muted">Title RU</th>
                                    <th class="py-3 text-muted">Description EN</th>
                                    <th class="py-3 text-muted">Description AR</th>
                                    <th class="py-3 text-muted">Description RU</th>
                                    <th class="py-3 text-muted">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold" style="color:#f57c00;">{{ $result->id }}</td>
                                    <td>
                                        <img src="{{ asset('img/Category/' . $result->cate_img) }}"
                                            style="width:60px; height:60px; object-fit:cover; border-radius:8px;">
                                    </td>
                                    <td>{{ $result->title_en }}</td>
                                    <td>{{ $result->title_ar }}</td>
                                    <td>{{ $result->title_ru }}</td>
                                    <td>{{ $result->description_en }}</td>
                                    <td>{{ $result->description_ar }}</td>
                                    <td>{{ $result->description_ru }}</td>
                                    <td>
                                        <a href="{{ route('home') }}" class="btn btn-sm"
                                            style="background:#2e7d32; color:white; border-radius:6px;">
                                            <i class="fa-solid fa-house"></i>
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