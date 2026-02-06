@extends('admin.layouts.admin')

@section('title', 'Просмотр компании')

@section('content')
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body p-4">

                <h1 class="fw-bold mb-3">
                    {{ $company->name }}
                </h1>

                <p class="text-muted mb-3">
                    ID компании: <span class="fw-semibold">{{ $company->id }}</span>
                </p>

                @if($company->created_at)
                    <p class="small text-muted mb-4">
                        Создана: {{ $company->created_at->format('d.m.Y H:i') }}
                    </p>
                @endif

                @if($company->description)
                    <div class="mb-4">
                        <h5 class="fw-bold mb-2">Описание</h5>
                        <p class="text-secondary mb-0">
                            {{ $company->description }}
                        </p>
                    </div>
                @endif

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="{{ route('admin.companies.index') }}" class="btn btn-outline-secondary">
                        ← Назад к списку
                    </a>

                    <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-warning">
                        Режим редактирования
                    </a>

                    <form action="{{ route('admin.companies.destroy', $company) }}" method="POST" onsubmit="return confirm('Удалить компанию?')" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Удалить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
