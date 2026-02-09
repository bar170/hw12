@extends('admin.layouts.admin')

@section('title', 'Компании')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Компании</h1>

    @if($companies->isEmpty())
        <div class="alert alert-info">
            Пока нет ни одной компании.
        </div>
    @else
        <div class="row">
            @foreach($companies as $company)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100 border-left-primary">
                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title fw-bold text-primary">
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
                                <a href="{{ route('admin.companies.show', $company->id) }}"
                                   class="btn btn-sm btn-primary">
                                    Подробнее
                                </a>
                                <a href="{{ route('admin.companies.edit', $company->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Редактировать
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
