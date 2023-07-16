<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Begin Registration Form --}}
                    <section class="h-screen">
                        <div class="container h-full px-6 py-24">
                            <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
                                <!-- Left column container with background-->
                                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
                                    <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                                        class="w-full" alt="Phone image" />
                                </div>

                                <!-- Right column container with form -->



                                <div class="md:w-8/12 lg:ml-6 lg:w-5/12">

                                    @if(Session::has('success'))
                                    <div class="alert alert-danger">

                                    </div>
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4"
                                        role="alert">
                                        <strong class="font-bold">{{ Session::get('success')}}</strong>
                                        {{-- <span class="block sm:inline">Something seriously bad happened.</span> --}}

                                    </div>
                                    @endif




                                    <form action="{{ route('user_tabs.update',$user->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <!-- Fullname input -->
                                        <div class="relative mb-6">
                                            <input type="text"
                                                class="w-full rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[2.15]"
                                                id="fullname" name="fullname" value="{{ $user->name }}" />
                                            @error('fullname')
                                            <label class="text-red-400">{{ $message }}</label>
                                            @enderror
                                        </div>

                                        <!-- Email input -->
                                        <div class="relative mb-6">
                                            <input type="email"
                                                class="w-full rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[2.15] bg-neutral-100"
                                                id="email" name="email" value="{{ $user->email }}" disabled />
                                            @error('email')
                                            <label class="text-red-400">{{ $message }}</label>
                                            @enderror
                                        </div>

                                        <!-- Password input -->
                                        <div class="relative mb-6">
                                            <input type="password"
                                                class="w-full rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[2.15]"
                                                id="password" name="password" placeholder="New Password" />
                                            @error('password')
                                            <label class="text-red-400">{{ $message }}</label>
                                            @enderror
                                        </div>

                                        <!-- Confirm Password input -->
                                        <div class="relative mb-6">
                                            <input type="password"
                                                class="w-full rounded border-1 bg-transparent px-3 py-[0.32rem] leading-[2.15]"
                                                id="password_confirmation" name="password_confirmation"
                                                placeholder="Confirm Password" />
                                            @error('password_confirmation')
                                            <label class="text-red-400">{{ $message }}</label>
                                            @enderror
                                        </div>



                                        <!-- Submit button -->
                                        <button type="submit"
                                            class="inline-block w-full rounded bg-blue px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-black shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-blue-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-blue-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                            data-te-ripple-init data-te-ripple-color="light">
                                            Submit
                                        </button>

                                        <!-- Divider -->
                                        <div
                                            class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                                            <p class="mx-4 mb-0 text-center font-semibold dark:text-neutral-200">
                                                OR
                                            </p>
                                        </div>

                                        {{-- Normal Sign in --}}
                                        <a class="mb-3 flex w-full items-center justify-center rounded bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                            style="background-color: #3b9873" href="{{ route('user_tabs') }}"
                                            role="button" data-te-ripple-init data-te-ripple-color="light">

                                            Go back
                                        </a>




                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- End Registration Form --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>