@extends('admin.base')

@section('admin.content')
    <h2>{{ __('Plans')}}</h2>

    @forelse ($plans as $plan)
        <a class="card mb-4" href="{{ route('admin.plan.edit', $plan) }}">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <h4 class="mb-0 mr-auto">{{ $plan->name }} <span class="text-muted">${{ number_format($plan->amount / 100, 2) }}</span></h4>
                    <span class="badge badge-{{ $plan->trashed() ? 'light' : 'primary' }}">{{ $plan->trashed() ? 'Inactive' : 'Active' }}</span>
                </div>
                <p class="mb-0">{{ $plan->description }}</p>
            </div>
        </a>
    @empty
        <div class="alert alert-info">{{ __('Your application has no plans.')}} <a href="{{ route('admin.plan.create') }}">{{ __('New Plan')}}</a></div>
    @endforelse

    <a class="btn btn-primary" href="{{ route('admin.plan.create') }}">{{ __('New Plan')}}</a>
@endsection
