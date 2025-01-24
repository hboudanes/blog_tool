@extends('layouts.appt')
@section('content')
{{-- <h1>TinyMCE Quick Start Guide</h1>
<form method="post" action="/post">
    @csrf
  <textarea id="mytextarea" name="cnt">Hello, World!</textarea>
  <input type="submit" value="Submit">
</form>
{!! $data ?? "no data " !!} --}}
<form method="POST" action="{{ isset($tag) ? route('tag.update', $tag->id) : route('tag.store') }}">
    @csrf <!-- CSRF token for security -->

    <!-- If editing, include the PUT method -->
    @if (isset($tag))
        @method('PUT')
    @endif

    <!-- Tag Name Input -->
    <div>
        <label for="name">Tag Name:</label>
        <input type="text" id="name" name="name" value="{{ $tag->name ?? old('name') }}" required>
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit">
            {{ isset($tag) ? 'Update Tag' : 'Add Tag' }}
        </button>
    </div>
</form>
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tags</h1>
  <p class="mb-4">This table displays all the Tags created by users.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tags Table</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>tage Name</th>
                         
                          <th>Created At</th>
                         
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>tage Name</th>
                         
                        <th>Created At</th>
                      </tr>
                  </tfoot>
                  <tbody>
                     @isset($tags)
                         
                     
                      @foreach ($tags as $tag)
                          <tr>
                              <td>{{ $tag->name }}</td>
                            
                             
                              <td>{{ $tag->created_at->format('Y-m-d H:i:s') }}</td>
                             
                          </tr>
                          <td>
                            <!-- Edit Button -->
                            <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <!-- Delete Button -->
                            <form action="{{ route('tag.destroy', $tag->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                      @endforeach
                      @endisset
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
@endsection
