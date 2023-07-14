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
                <div class="container my-12 py-12 mx-auto px-4 md:px-6 lg:px-12">

                    <!--Section: Design Block-->
                    <section class="mb-20 text-gray-800">

                        <div class="block rounded-lg shadow-lg bg-white">
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table class="min-w-full mb-0">
                                                <thead class="border-b bg-gray-50 rounded-t-lg text-left">
                                                    <tr>
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
                                                                class="text-xs py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-medium bg-green-200 text-green-600 rounded-full">Active</span>
                                                        </td>
                                                        <td
                                                            class="align-middle text-gray-500 text-sm font-normal px-6 py-4 whitespace-nowrap text-left">
                                                            Admin</td>
                                                        <td
                                                            class="align-middle text-right text-sm font-normal px-6 py-4 whitespace-nowrap border-black">
                                                            <a href="#"
                                                                class="font-small text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 transition duration-300 ease-in-out  border-black">Show</a>
                                                            <a href="#"
                                                                class="font-small text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 transition duration-300 ease-in-out">Edit</a>
                                                            <a href="#"
                                                                class="font-small text-blue-600 hover:text-blue-700 focus:text-blue-700 active:text-blue-800 transition duration-300 ease-in-out">Delete</a>
                                                        </td>
                                                    </tr>

                                                    @empty

                                                    No User Found!

                                                    @endforelse





                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                    <!--Section: Design Block-->

                </div>
                <!-- User Table End -->




            </div>
        </div>
    </div>
</x-app-layout>