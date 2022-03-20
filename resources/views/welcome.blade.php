<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tag Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>

<body class="bg-gray-200 py-10">
    <div class="max-w-lg bg-white mx-auto p-5 shadow">
        @if ($errors->any())
            <ul class="list-none p-4 mb-4 bg-red-100 text-red-500 rounded">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="flex justify-between">
            <a class="flex items-center mb-5 text-purple-500 font-bold" href="/">
                <i class="fas fa-tags"></i>
                <span class="ml-1">Tag Manager</span>
            </a>

            @if(isset($tag))
                <a class="flex items-center mb-5 text-blue-500" href="/">
                    <i class="fas fa-arrow-left"></i>
                    <span class="ml-1">Volver</span>
                </a>
            @endif
        </div>

        @if (empty($tag))
            <form action="/tags" method="POST" class="flex mb-4">
                @csrf
                <input type="text" name="name" class="rounded-l bg-gray-200 p-4 w-full outline-none"
                    placeholder="Tag 1">
                <input type="submit" value="Add" class="rounded-r px-8 bg-blue-500 text-white outline-none">
            </form>
        @else
            <form action="/tags/{{$tag->id}}" method="POST" class="flex mb-4">
                @csrf
                @method('PUT')

                <input type="text" value="{{ $tag->name }}" name="name"
                    class="rounded-l bg-gray-200 p-4 w-full outline-none">
                <input type="submit" value="Update" class="rounded-r px-8 bg-blue-500 text-white outline-none">
            </form>
        @endif

        <h4 class="text-lg text-center font-bold mb-6">Tags</h4>

        <table class="table-auto">
            <thead>
                <tr>
                    <th>Tag</th>
                    <th>Slug</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $tag)
                    <tr>
                        <td width="35%" class="border px-4 py-2">{{ $tag->name }}</td>
                        <td width="35%" class="border px-4 py-2">{{ $tag->slug }}</td>
                        <td class="px-4 py-2">
                            <div class="flex gap-1">
                                <form action="/tags/{{ $tag->id }}" method="GET">
                                    @csrf
                                    <div class="flex gap-1 items-center p-2 max-h-8 rounded bg-blue-500 text-white">
                                        <i class="fas fa-pencil"></i>
                                        <input type="submit" value="Edit">
                                    </div>
                                </form>
                                <form action="/tags/{{ $tag->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="flex gap-1 items-center p-2 max-h-8 rounded bg-red-500 text-white">
                                        <i class="fas fa-trash"></i>
                                        <input type="submit" value="Remove">
                                    </div>
                                </form>
                            </div>                          
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>There are no tags.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
