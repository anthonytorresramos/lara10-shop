<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registered Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">




                <!-- User Table Begin -->
                {{-- <div class="container my-12 py-12 mx-auto px-4 md:px-6 lg:px-12"> --}}

                    <!--Section: Design Block-->
                    <section class="mb-20 text-gray-800">

                        <div class="block rounded-lg shadow-lg bg-white">
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full sm:px-6 lg:px-8">


                                        <div class="overflow-hidden">
                                            @if(Session::has('success'))
                                            <div class="alert alert-danger">

                                            </div>
                                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4"
                                                role="alert">
                                                <strong class="font-bold">{{ Session::get('success')}}</strong>
                                                {{-- <span class="block sm:inline">Something seriously bad
                                                    happened.</span>
                                                --}}

                                            </div>
                                            @endif

                                            <a type="button" href="{{ route('user_tabs.archive') }}"
                                                class="my-4 float-right text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                                                title="View All Deleted">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                                </svg>
                                            </a>

                                            <a type="button" href="{{ route('user_tabs.create') }}"
                                                title="Create New User"
                                                class="my-4 float-right text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                                </svg>
                                            </a>



                                            <table class="min-w-full mb-0" id="usertable">
                                                <thead class="border-b bg-gray-50 rounded-t-lg text-left">
                                                    <tr>
                                                        <th scope="col"
                                                            class="rounded-tl-lg text-sm font-medium px-6 py-4">
                                                            ID
                                                        </th>
                                                        <th scope="col"
                                                            class="rounded-tl-lg text-sm font-medium px-6 py-4">
                                                            NAME
                                                        </th>
                                                        <th scope="col" class="text-sm font-medium px-6 py-4">TITLE
                                                        </th>
                                                        <th scope="col" class="text-sm font-medium px-6 py-4">STATUS
                                                        </th>
                                                        <th scope="col" class="text-sm font-medium px-6 py-4">ROLE
                                                        </th>
                                                        <th scope="col"
                                                            class="rounded-tr-lg text-sm font-medium px-6 py-4">
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    @forelse ($users as $user)

                                                    <tr class="border-b">
                                                        <td
                                                            class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left">
                                                            <div class="flex flex-col">
                                                                <p class="mb-0.5">{{ $user->id }}</p>

                                                            </div>
                                                        </td>
                                                        <th scope="row"
                                                            class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left">
                                                            <div class="flex flex-row items-center">
                                                                <img class="rounded-full w-12"
                                                                    src="https://mdbootstrap.com/img/new/avatars/9.jpg"
                                                                    alt="Avatar" />
                                                                <div class="ml-4">
                                                                    <p class="mb-0.5 font-medium">{{ $user->name }}
                                                                    </p>
                                                                    <p class="mb-0.5 text-gray-500">
                                                                        {{ $user->email }}</p>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <td
                                                            class="text-sm font-normal px-6 py-4 whitespace-nowrap text-left">
                                                            <div class="flex flex-col">
                                                                <p class="mb-0.5">Senior Software Engineer</p>

                                                            </div>
                                                        </td>
                                                        <td
                                                            class="align-middle text-sm font-normal px-6 py-4 whitespace-nowrap text-left">
                                                            <span
                                                                class="text-xs py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-medium bg-red-200 text-red-600 rounded-full">Inactive</span>
                                                        </td>
                                                        <td
                                                            class="align-middle text-gray-500 text-sm font-normal px-6 py-4 whitespace-nowrap text-left">
                                                            Admin</td>
                                                        <td
                                                            class="align-middle text-right text-sm font-normal px-6 py-4 whitespace-nowrap border-black">
                                                            <div class="flex items-center justify-content-end">
                                                                <a href="{{ route('user_tabs.restore',$user->id) }}"
                                                                    class="text-green-400 hover:text-green-700 hover:scale-110 focus:text-blue-700 active:text-blue-800 transition duration-300 ease-in-out"
                                                                    title="restore">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                                    </svg>


                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>

                                                    @empty

                                                    No User Found!

                                                    @endforelse





                                                </tbody>
                                            </table>



                                            <div class="my-4 d-flex justify-content-center m-3">
                                                <span class="inline-flex items-center">
                                                    <span class="text-gray-500">Showing {{ $users->perPage() }}
                                                        entries</span>
                                                    <span class="mx-2">/</span>
                                                    <span class="text-gray-500">{{ $users->currentPage() }} out of {{
                                                        $users->lastPage() }} pages</span>
                                                </span>
                                                <span class="inline-flex items-center float-right">
                                                    @if ($users->previousPageUrl())
                                                    <a class="page-link mx-2" href="{{ $users->previousPageUrl() }}"
                                                        aria-label="Previous">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M21 16.811c0 .864-.933 1.405-1.683.977l-7.108-4.062a1.125 1.125 0 010-1.953l7.108-4.062A1.125 1.125 0 0121 8.688v8.123zM11.25 16.811c0 .864-.933 1.405-1.683.977l-7.108-4.062a1.125 1.125 0 010-1.953L9.567 7.71a1.125 1.125 0 011.683.977v8.123z" />
                                                        </svg>
                                                    </a>
                                                    @endif

                                                    <input type="number" class="page-link text-center" min="1"
                                                        max="{{ $users->lastPage() }}" id="pageNumber"
                                                        value="{{ $users->currentPage() }}" style="outline: none;" />

                                                    @if ($users->nextPageUrl())
                                                    <a class="page-link mx-2" href="{{ $users->nextPageUrl() }}"
                                                        aria-label="Next">
                                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062A1.125 1.125 0 013 16.81V8.688zM12.75 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062a1.125 1.125 0 01-1.683-.977V8.688z" />
                                                        </svg>
                                                    </a>
                                                    @endif
                                                </span>
                                            </div>





                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                    <!--Section: Design Block-->

                    {{--
                </div> --}}
                <!-- User Table End -->




            </div>
        </div>
    </div>
</x-app-layout>