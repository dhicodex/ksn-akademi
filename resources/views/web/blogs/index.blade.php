@extends('layouts.app')

@section('content')
    <x-header-component />

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Blogs</h1>

        <div id="blogs-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($blogs as $blog)
                <div class="bg-white rounded-lg shadow-md">
                    <img src="{{ $blog->image_src ? asset('storage/' . $blog->image_src) : asset('images/broken-image.png') }}" alt="{{ $blog->title }}" class="rounded-t-lg {{ $blog->image_src ? '' : 'py-2 px-10 object-cover' }}">
                    <div class="p-6">
                        <h2 class="font-bold text-xl mb-2">{{ $blog->title }}</h2>
                        <p class="text-gray-700 text-base">
                            {!! Str::limit($blog->content, 100) !!}
                        </p>
                                                                        <a href="{{ route('blogs.show', $blog) }}" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="hidden md:block">
            {{ $blogs->links() }}
        </div>

        <div class="md:hidden text-center mt-8">
            <button id="load-more" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Load More
            </button>
        </div>
    </div>

    <x-footer-component />
@endsection

@push('scripts')
<script>
    let nextPage = 2;
    let lastPage = {{ $blogs->lastPage() }};

    document.getElementById('load-more').addEventListener('click', function() {
        if (nextPage > lastPage) {
            this.style.display = 'none';
            return;
        }

        fetch(`/api/v1/blogs?page=${nextPage}`)
            .then(response => response.json())
            .then(data => {
                const blogsContainer = document.getElementById('blogs-container');
                data.data.data.forEach(blog => {
                    const blogElement = `
                        <div class="bg-white rounded-lg shadow-md">
                            <img src="${blog.image_src ? '/storage/' + blog.image_src : '/images/broken-image.png'}" alt="${blog.title}" class="rounded-t-lg">
                            <div class="p-6">
                                <h2 class="font-bold text-xl mb-2">${blog.title}</h2>
                                <p class="text-gray-700 text-base">
                                    ${blog.content.substring(0, 100)}
                                </p>
                                <a href="/blogs/${blog.slug}" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">Read More</a>
                            </div>
                        </div>
                    `;
                    blogsContainer.insertAdjacentHTML('beforeend', blogElement);
                });

                nextPage++;

                if (nextPage > lastPage) {
                    document.getElementById('load-more').style.display = 'none';
                }
            });
    });
</script>
@endpush
