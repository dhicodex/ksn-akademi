@extends('layouts.app')

@section('content')
    <x-header-component />

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold mb-4">{{ $blog->title }}</h1>
            <div class="text-gray-600 mb-8">
                <span>Published on {{ $blog->created_at->format('F d, Y') }}</span>
            </div>
            <div class="prose lg:prose-xl max-w-none">
                {!! $blog->content !!}
            </div>

            <div class="mt-8">
                <h3 class="text-2xl font-bold mb-4">Share this post</h3>
                <div class="flex items-center space-x-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                        <i class="fab fa-facebook-f fa-2x"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="text-blue-400 hover:text-blue-600">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . url()->current()) }}" target="_blank" class="text-green-500 hover:text-green-700">
                        <i class="fab fa-whatsapp fa-2x"></i>
                    </a>
                    <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                        <i class="fab fa-telegram-plane fa-2x"></i>
                    </a>
                    <button id="copy-link" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-link fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <x-footer-component />
@endsection

@push('scripts')
<script>
    document.getElementById('copy-link').addEventListener('click', function() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(function() {
            alert('Link copied to clipboard!');
        }, function() {
            alert('Failed to copy link.');
        });
    });
</script>
@endpush
