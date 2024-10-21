<div>
    <h2>posts:</h2>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->post_title }}</td>
                    <td>{{ $post->post_content }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
