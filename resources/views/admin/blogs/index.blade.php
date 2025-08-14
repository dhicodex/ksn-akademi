@extends('layouts.admin')

@section('title', 'Manage Blogs')

@section('css-custom')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endsection

@section('content')
<div class="mb-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-700">Blogs List</h2>
        <a href="{{ route('admin.blogs.create') }}" class="btn-primary py-2 px-4">Create New Blog</a>
    </div>
</div>

<!-- Filter Form (Simplified for DataTables) -->
<div class="mb-6 bg-white p-4 rounded-lg shadow">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label for="category-filter" class="block text-sm font-medium text-gray-700">Filter by Category</label>
            <select id="category-filter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="status-filter" class="block text-sm font-medium text-gray-700">Filter by Status</label>
            <select id="status-filter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">All Status</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </select>
        </div>
        <div class="self-end">
            <button type="button" id="clear-filters" class="py-2 px-4 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Clear Filters</button>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <table id="blogs-table" class="min-w-full divide-y divide-gray-200 p-5">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($blogs as $blog)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $blog->title }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $blog->category->name ?? 'N/A' }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $blog->status == 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ ucfirst($blog->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $blog->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="inline-block delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('js-custom')
    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#blogs-table').DataTable({
            responsive: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50, 100],
            order: [[3, 'desc']], // Sort by created date descending
            columnDefs: [
                { 
                    targets: -1, // Actions column
                    orderable: false,
                    searchable: false
                }
            ],
            language: {
                lengthMenu: "Show _MENU_ entries per page",
                zeroRecords: "No blogs found matching your criteria",
                info: "Showing _START_ to _END_ of _TOTAL_ blogs",
                infoEmpty: "Showing 0 to 0 of 0 blogs",
                infoFiltered: "(filtered from _MAX_ total blogs)",
                search: "Search blogs:",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            },
            dom: '<"flex flex-col sm:flex-row justify-between items-center mb-4 p-5 pb-0"lf>t<"flex flex-col sm:flex-row justify-between items-center mt-4 px-5"ip>'
        });

        // Category filter
        $('#category-filter').on('change', function() {
            var selectedCategory = this.value;
            table.column(1).search(selectedCategory).draw();
        });

        // Status filter
        $('#status-filter').on('change', function() {
            var selectedStatus = this.value;
            table.column(2).search(selectedStatus).draw();
        });

        // Clear filters
        $('#clear-filters').on('click', function() {
            $('#category-filter').val('');
            $('#status-filter').val('');
            table.search('').columns().search('').draw();
        });

        // Delete confirmation
        $(document).on('submit', '.delete-form', function(e) {
            e.preventDefault();
            
            if (confirm('Are you sure you want to delete this blog? This action cannot be undone.')) {
                this.submit();
            }
        });

        // Custom search placeholder
        $('.dataTables_filter input').attr('placeholder', 'Search by title, category, or status...');
    });
    </script>
@endsection