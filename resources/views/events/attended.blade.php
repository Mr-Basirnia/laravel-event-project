<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Attended Events') }}
            </h2>

        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto">
                <!-- component -->
                <section class="bg-white dark:bg-slate-800 rounded-md space-y-2">
                    <div class="container px-6 py-10 mx-auto">

                        <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                            @foreach ($attendedEvents as $event)
                                <div class="lg:flex bg-stone-700 dark:bg-slate-900 rounded-md">
                                    <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                                        src="{{ asset('/storage/' . $event->image) }}" alt="{{ $event->title }}">

                                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                                        <a href="{{ route('eventShow', $event->id) }}"
                                            class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                            {{ $event->title }}
                                        </a>

                                        <span class="text-sm text-gray-500 dark:text-gray-300">
                                            {{ $event->country->name }}
                                        </span>
                                        <span class="text-sm text-gray-500 dark:text-gray-300 flex flex-wrap space-x-2">
                                            @foreach ($event->tags as $tag)
                                                <p class="text-sm p-1 bg-slate-300 rounded-md text-gray-800 ">
                                                    {{ $tag->name }}
                                                </p>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</x-app-layout>
