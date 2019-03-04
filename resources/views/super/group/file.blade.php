<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Title</th>
            <th>Path</th>
            <th>URL</th>
            <th>Created</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        @foreach($files as $file)
        <tr>
            <td>{{ $file->title }}</td>
            <td>{{ $file->filename }}</td>
            <td>
                <a href="{{ Storage::url($file->filename) }}">
                    View
                </a>
            </td>
            <td>{{ $file->created_at->diffForHumans() }}</td>
        </tr>
        @endforeach
        </tr>
    </tbody>
</table>
