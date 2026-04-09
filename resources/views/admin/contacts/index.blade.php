@extends('admin.layouts.app')
@section('title', 'Enquiries')

@section('content')
<div class="page-toolbar">
    <div>
        <div class="page-toolbar-eyebrow">Inbox</div>
        <h6 class="page-toolbar-title">All Enquiries</h6>
        <p class="page-toolbar-meta">Track incoming website enquiries, review message status, and keep follow-ups moving.</p>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                <tr class="{{ !$contact->is_read ? 'fw-bold' : '' }}">
                    <td><span class="fw-semibold">{{ $contact->name }}</span></td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone ?? '-' }}</td>
                    <td>{{ $contact->created_at->format('d M Y') }}</td>
                    <td>
                        <form action="{{ route('admin.contacts.toggleRead', $contact) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button class="badge border-0 {{ $contact->is_read ? 'bg-secondary' : 'bg-warning text-dark' }}">
                                {{ $contact->is_read ? 'Read' : 'Unread' }}
                            </button>
                        </form>
                    </td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-outline-primary btn-icon" aria-label="View enquiry"><i class="bi bi-eye"></i></a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this enquiry?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger btn-icon" aria-label="Delete enquiry"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="empty-row">No enquiries yet</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">{{ $contacts->links() }}</div>
@endsection
