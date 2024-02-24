<!-- resources/views/auth/login.blade.php -->

@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Blog Posts</h2>
            <div id="postList">
                <!-- Posts will be dynamically added here -->
            </div>
        </div>
    </div>
</div>

<!-- Modal for Post Detail -->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel">Post Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="postDetail"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="module">
    $(document).ready(function() {
        // Fetch blog posts from the API endpoint
        $.ajax({
            url: '/api/post/auth/get',
            type: 'GET',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('jwtToken') // Include JWT token in headers
            },
            success: function(response) {
                // Display the blog posts
                displayPosts(response.data.postLists);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching blog posts:', error);
            }
        });

        // Function to display blog posts
        function displayPosts(posts) {
            var postList = $('#postList');
            $.each(posts, function(index, post) {
                var postHtml = '<div class="card mb-3">';
                postHtml += '<div class="card-body">';
                postHtml += '<h5 class="card-title">' + post.title + '</h5>';
                postHtml += '<p class="card-text">Category: ' + post.category + '</p>';
                postHtml += '<button class="btn btn-primary detail-btn" data-bs-toggle="modal" data-bs-target="#postModal" data-description="' + post.detail.desc + '"><i class="bi bi-eye"></i> Detail</button>';
                postHtml += '</div>';
                postHtml += '</div>';
                postList.append(postHtml);
            });

            // Show post detail in modal when detail button is clicked
            $('.detail-btn').on('click', function() {
                var description = $(this).data('description');
                $('#postDetail').text(description);
            });
        }
    });
</script>
@endpush
