<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-between">
            {{ __('Posts') }}
            <a href="{{ route('posts.create') }}" class="bg-teal-400 text-xs text-white rounded px-3 py-2">Crear</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="mb-4">
                        @forelse ($posts as $post)
                            <tr class="border-b border-gray-200 text-sm">
                                <td class="px-6 py-4">{{ $post->title }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('posts.edit', $post) }}" class="text-indigo-600">Editar</a>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <input type="submit" value="Eliminar" class="
                                        bg-red-800
                                        text-white
                                        rounded
                                        px-4
                                        py-2"
                                        onclick="return confirm('Desea eliminar?')">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b border-gray-200 text-sm">
                                <td colspan="3" class="px-6 py-4 text-center">Upps! No hay ninguna publicación disponible</td>
                            </tr>
                        @endforelse
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
