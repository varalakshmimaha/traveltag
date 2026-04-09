@extends('admin.layouts.app')
@section('title', 'Add Program')

@section('content')
<form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><h6 class="mb-0">Program Details</h6></div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category *</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Price (₹)</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price') }}" step="0.01">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Duration</label>
                            <input type="text" name="duration" class="form-control" value="{{ old('duration') }}" placeholder="e.g. 3 Days / 2 Nights">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="2">{{ old('short_description') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Full Description</label>
                            <textarea name="description" class="form-control" rows="6" id="description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Itinerary --}}
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Itinerary</h6>
                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="addItinerary()"><i class="bi bi-plus"></i> Add Day</button>
                </div>
                <div class="card-body" id="itinerary-container">
                    <div class="itinerary-row row g-2 mb-2">
                        <div class="col-md-4">
                            <input type="text" name="itinerary_day[]" class="form-control" placeholder="Day Title (e.g. Day 1 - Arrival)">
                        </div>
                        <div class="col-md-7">
                            <textarea name="itinerary_desc[]" class="form-control" rows="1" placeholder="Description"></textarea>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.itinerary-row').remove()"><i class="bi bi-x"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><h6 class="mb-0">Publish</h6></div>
                <div class="card-body">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                        <label class="form-check-label">Active</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="featured" value="1">
                        <label class="form-check-label">Featured</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="bi bi-check-lg"></i> Save Program</button>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><h6 class="mb-0">Thumbnail</h6></div>
                <div class="card-body">
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white"><h6 class="mb-0">Gallery Images</h6></div>
                <div class="card-body">
                    <input type="file" name="gallery[]" class="form-control" accept="image/*" multiple>
                    <small class="text-muted">You can select multiple images</small>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
function addItinerary() {
    const container = document.getElementById('itinerary-container');
    const row = document.createElement('div');
    row.className = 'itinerary-row row g-2 mb-2';
    row.innerHTML = `
        <div class="col-md-4"><input type="text" name="itinerary_day[]" class="form-control" placeholder="Day Title"></div>
        <div class="col-md-7"><textarea name="itinerary_desc[]" class="form-control" rows="1" placeholder="Description"></textarea></div>
        <div class="col-md-1"><button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.itinerary-row').remove()"><i class="bi bi-x"></i></button></div>
    `;
    container.appendChild(row);
}
</script>
@endpush
@endsection
