@extends('admin.layouts.app')
@section('title', 'Edit Program')

@section('content')
<form action="{{ route('admin.programs.update', $program) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><h6 class="mb-0">Program Details</h6></div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $program->title) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category *</label>
                            <select name="category_id" class="form-select" required>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $program->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Price (₹)</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price', $program->price) }}" step="0.01">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Duration</label>
                            <input type="text" name="duration" class="form-control" value="{{ old('duration', $program->duration) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="2">{{ old('short_description', $program->short_description) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Full Description</label>
                            <textarea name="description" class="form-control" rows="6">{{ old('description', $program->description) }}</textarea>
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
                    @foreach($program->itineraries as $it)
                    <div class="itinerary-row row g-2 mb-2">
                        <div class="col-md-4">
                            <input type="text" name="itinerary_day[]" class="form-control" value="{{ $it->day_title }}">
                        </div>
                        <div class="col-md-7">
                            <textarea name="itinerary_desc[]" class="form-control" rows="1">{{ $it->description }}</textarea>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.itinerary-row').remove()"><i class="bi bi-x"></i></button>
                        </div>
                    </div>
                    @endforeach
                    @if($program->itineraries->isEmpty())
                    <div class="itinerary-row row g-2 mb-2">
                        <div class="col-md-4"><input type="text" name="itinerary_day[]" class="form-control" placeholder="Day Title"></div>
                        <div class="col-md-7"><textarea name="itinerary_desc[]" class="form-control" rows="1" placeholder="Description"></textarea></div>
                        <div class="col-md-1"><button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.itinerary-row').remove()"><i class="bi bi-x"></i></button></div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><h6 class="mb-0">Publish</h6></div>
                <div class="card-body">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="status" value="1" {{ $program->status ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="featured" value="1" {{ $program->featured ? 'checked' : '' }}>
                        <label class="form-check-label">Featured</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><i class="bi bi-check-lg"></i> Update Program</button>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white"><h6 class="mb-0">Thumbnail</h6></div>
                <div class="card-body">
                    @if($program->thumbnail)
                        <img src="{{ asset('storage/' . $program->thumbnail) }}" class="img-fluid rounded mb-2">
                    @endif
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white"><h6 class="mb-0">Gallery Images</h6></div>
                <div class="card-body">
                    @foreach($program->images as $img)
                    <div class="d-inline-block position-relative me-2 mb-2">
                        <img src="{{ asset('storage/' . $img->image) }}" width="80" class="rounded">
                        <form action="{{ route('admin.programs.deleteImage', $img) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger position-absolute top-0 end-0" style="padding:0 5px;font-size:.7rem">x</button>
                        </form>
                    </div>
                    @endforeach
                    <input type="file" name="gallery[]" class="form-control mt-2" accept="image/*" multiple>
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
