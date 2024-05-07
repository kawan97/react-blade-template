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
        <form
            class="flex flex-column sm:flex-row flex-wrap space-y-4 space-x-4 sm:space-y-0 items-start justify-start pb-4">
            <div>
                <select id="language_id" name="language_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="" selected>Language</option>
                    @foreach ($languages as $language)
                        <option value="{{ $language->id }}"
                            {{ request()->get('language_id') == $language->id ? 'selected' : '' }}>{{ $language->name }}
                        </option>
                    @endforeach
                </select>

            </div>
            <div>
                <input type="text" name="title" value="{{ request()->get('title') }}" id="table-search"
                    class="block p-2  text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Search for Title">
            </div>

            <button type="submit"
                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.7962 4H5.20377C4.34461 4 3.88543 5.01192 4.45119 5.6585L9.75258 11.7172C9.91208 11.8995 10 12.1335 10 12.3757V17.25C10 17.4074 10.0741 17.5556 10.2 17.65L13.2 19.9C13.5296 20.1472 14 19.912 14 19.5V12.3757C14 12.1335 14.0879 11.8995 14.2474 11.7172L19.5488 5.6585C20.1146 5.01192 19.6554 4 18.7962 4Z"
                        stroke="#fff" stroke-width="2" stroke-linecap="round" />
                </svg>

                <span class="sr-only">Icon description</span>
            </button>
        </form>


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
                        <td class="px-6 py-4 flex flex-row">
                            <a href="{{ route('dashboard.article.edit', $article->id) }}"
                                class="text-primary-700 border border-primary-700 hover:bg-primary-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-primary-500 dark:text-primary-500 dark:hover:text-white dark:focus:ring-primary-800 dark:hover:bg-primary-500">
                                <svg class="w-5 h-5" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.77885 15.779L1.36085 17.918L3.49985 11.5M7.77885 15.779L16.1428 7.13599C16.7099 6.56839 17.0285 5.79885 17.0285 4.99649C17.0285 4.19413 16.7099 3.42459 16.1428 2.85699C15.5752 2.28987 14.8057 1.97131 14.0033 1.97131C13.201 1.97131 12.4314 2.28987 11.8638 2.85699L3.49985 11.5M7.77885 15.779L3.49985 11.5M5.63885 13.64L11.8516 7.13599M9.75094 5.04036L13.9998 9.27899"
                                        fill="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <span class="sr-only">Icon description</span>
                            </a>

                            <form action="{{ route('dashboard.article.destroy', $article->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-700 border border-red-700 hover:bg-red-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800 dark:hover:bg-red-500">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 7H19M10 10V18M14 10V18M10 3H14C14.2652 3 14.5196 3.10536 14.7071 3.29289C14.8946 3.48043 15 3.73478 15 4V7H9V4C9 3.73478 9.10536 3.48043 9.29289 3.29289C9.48043 3.10536 9.73478 3 10 3ZM6 7H18V20C18 20.2652 17.8946 20.5196 17.7071 20.7071C17.5196 20.8946 17.2652 21 17 21H7C6.73478 21 6.48043 20.8946 6.29289 20.7071C6.10536 20.5196 6 20.2652 6 20V7Z"
                                            stroke="#383838" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                </button>
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
