@extends('layouts.app')
@section('title','create new post')

@section('content')

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Posts</h1>
  <p class="mb-4">This table displays all the posts created by users.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Posts Table</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Title</th>
                          <th>slug</th>
                          <th>Status</th>
                          <th>Created At</th>
                          <th>Tags</th>
                          <th>Actions</th> <!-- New column for actions -->
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>Title</th>
                          <th>slug</th>
                          <th>Status</th>
                          <th>Created At</th>
                          <th>Tags</th>
                          <th>Actions</th> <!-- New column for actions -->
                      </tr>
                  </tfoot>
                  <tbody>
                      @foreach ($posts as $post)
                          <tr>
                              <td>{{ $post->title }}</td>
                              <th>{{ $post->slug }}</th>
                              <td>
                                  @if ($post->status)
                                      <span class="badge badge-success">Active</span>
                                  @else
                                      <span class="badge badge-danger">Inactive</span>
                                  @endif
                              </td>
                              <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                              <td>
                                  @foreach ($post->tags as $tag)
                                      <span class="badge badge-primary">{{ $tag->name }}</span>
                                  @endforeach
                              </td>
                              <td>
                                  <!-- Edit Button -->
                                  <a href="{{ route('post.edit',[$post->id,"slug"=>$post->slug] ) }}" class="btn btn-sm btn-primary">
                                      <i class="fas fa-edit"></i> Edit
                                  </a>
                                  <a href="{{ route('post.show',[$post->id,"slug"=>$post->slug] ) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> show
                                </a>
                                  <!-- Delete Button -->
                                  <x-form action="{{ route('post.destroy', $post->id) }}" method="DELETE" style="display:inline;">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                  </x-form>

                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
@endsection
