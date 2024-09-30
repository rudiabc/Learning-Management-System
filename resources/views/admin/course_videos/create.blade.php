<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add Video to Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="w-full py-3 text-white bg-red-500 rounded-3xl">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <div class="flex flex-row items-center justify-between item-card gap-y-10">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($course->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-xl font-bold text-indigo-950">{{ $course->name }}</h3>
                            <p class="text-sm text-slate-500">{{ $course->category->name }}</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Teacher</p>
                        <h3 class="text-xl font-bold text-indigo-950">{{ $course->teacher->user->name }}</h3>
                    </div>
                </div>

                <hr class="my-5">

                <form method="POST" action="{{ route('admin.course.add_video.save', $course->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="path_video" :value="__('path_video')" />
                        <x-text-input id="path_video" class="block w-full mt-1" type="text" name="path_video" :value="old('path_video')" required autofocus autocomplete="path_video" />
                        <x-input-error :messages="$errors->get('path_video')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="textvideo" :value="__('textvideo')" />
                        <textarea name="textvideo" id="textvideo" cols="30" rows="5" class="w-full border border-slate-300 rounded-xl" :value="old('textvideo')" required autofocus autocomplete="textvideo"></textarea>
                        <x-input-error :messages="$errors->get('textvideo')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Add New Video
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
