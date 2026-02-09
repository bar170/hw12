@extends('admin.layouts.admin')


@section('title', 'Компании')

@section('body')
<div class="container py-5">

    <h1 class="mb-4 fw-bold">Компании</h1>

    @if($companies->isEmpty())
        <div class="alert alert-info">
            Пока нет ни одной компании.
        </div>
    @else
        <div class="row g-4">
            @foreach($companies as $company)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title fw-bold">
                                {{ $company->name }}
                            </h5>

                            <p class="text-muted mb-2">
                                ID: {{ $company->id }}
                            </p>

                            @if($company->created_at)
                                <p class="small text-muted">
                                    Создана: {{ $company->created_at->format('d.m.Y H:i') }}
                                </p>
                            @endif

                            <div class="mt-auto">
                                <a href="{{ route('admin.companies.show', $company->id) }}" class="btn btn-primary btn-sm">
                                    Подробнее
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
