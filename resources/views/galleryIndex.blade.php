<x-main-layout>

    <!-- component -->
    <section class="bg-white dark:bg-slate-800 rounded-md space-y-2">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">All Galleries</h1>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                @foreach ($galleries as $gallery)
                    <div class="lg:flex bg-stone-700 dark:bg-slate-900 rounded-md">
                        <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                            src="{{ asset('/storage/' . $gallery->image) }}" alt="{{ $gallery->caption }}">

                        <div class="flex flex-col justify-between py-6 lg:mx-6">
                            <a href="#"
                                class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                {{ $gallery->caption }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-main-layout>
