@extends('admin.layouts.app')
@section('title', 'View Enquiry')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <strong>Name:</strong>
                <p>{{ $contact->name }}</p>
            </div>
            <div class="col-md-6">
                <strong>Email:</strong>
                <p><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
            </div>
            <div class="col-md-6">
                <strong>Phone:</strong>
                <p>{{ $contact->phone ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6">
                <strong>Date:</strong>
                <p>{{ $contact->created_at->format('d M Y, h:i A') }}</p>
            </div>
            <div class="col-12">
                <strong>Message:</strong>
                <div class="p-3 bg-light rounded mt-1">{{ $contact->message }}</div>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                @csrf @method('DELETE')
                <button class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
