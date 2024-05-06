@extends('admin.layouts.app', ['pageTitle' => 'Articles'])
@section('content')
    <nav class="flex items-center justify-between py-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard.home') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('dashboard.article.index') }}"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Articles</a>
                </div>
            </li>

        </ol>

        <a href="{{ route('dashboard.article.create') }}"
            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 12H12H19M12 19L12 5" stroke="#fff" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="sr-only">Add Article</span>
        </a>



    </nav>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        slug
                    </th>
                    <th scope="col" class="px-6 py-3">
                        view_count
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Language
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $article->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $article->slug }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $article->view_count }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $article->language->name }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('dashboard.article.edit', $article->id) }}"
                                class="font-medium text-primary-600 dark:text-primary-500 hover:underline">Edit</a>

                            <form action="{{ route('dashboard.article.destroy', $article->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-medium text-red-500 dark:text-red-400 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach




            </tbody>
        </table>

        <div class="p-5">
            {{ $articles->links() }}
        </div>

        

    </div>
@endsection
