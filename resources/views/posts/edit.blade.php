@extends('layouts.main')

@section('content')
    <section class="mx-8 font-mono bg-slate-800 rounded-lg px-4 py-6 ring-1 ring-slate-900/5 shadow-xl">
        <h1 class="text-2xl mb-6 text-white">
            แก้ไขรายการปัญหา
        </h1>

        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="relative z-0 mb-6 w-full group">
                <label for="title" class="block mb-2 text-sm font-medium text-slate-200 dark:text-gray-300">
                    ชื่อปัญหา
                </label>
                @if ($errors->has('title'))
                    <p class="text-red-500">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <input type="text" name="title" id="title"
                       class="bg-gray-50 border border-gray-300 text-slate-200text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('title', $post->title) }}"
                       placeholder="" required>
            </div>

            {{-- <div class="relative z-0 mb-6 w-full group">
                <label for="tags" class="block mb-2 text-sm font-medium text-slate-200 dark:text-gray-300">
                    หมวดหมู่ (แบ่งโดยใช้ comma ",")
                </label>
                <input type="text" name="tags" id="tags"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ $tags }}"
                       placeholder="" autocomplete="off">
            </div> --}}

            <div class="relative z-0 mb-6 w-full group">
                <label for="tags" class="block mb-2 text-sm font-medium text-slate-200 dark:text-gray-300">
                    หมวดหมู่
                </label>
                <select class="tags" name="tags" id="tags" class="from-control" required>
                    <option value="" selected hidden disabled>เลือกประเภทปัญหา</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="description" class="block mb-2 text-sm font-medium text-slate-200 dark:text-gray-400">
                    รายละเอียดปัญหา
                </label>
                @if ($errors->has('description'))
                    <p class="text-red-500">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <textarea rows="4" type="text" name="description" id="description"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          required >{{ old('description', $post->description) }}</textarea>
            </div>

            <div class="col-md-12">
                <div class="form-group relative z-0 mb-6 w-full group ">
                    <input type="file" name="image" placeholder="Choose image" id="image" class="rounded-md border border-slate-200 text-slate-200">
                @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <div>
                <button class="app-button" type="submit">แก้ไข</button>
            </div>

        </form>
    </section>

    @can('delete', $post)
        <section class="mx-8 mt-16">
            <div class="relative py-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-b border-red-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white px-4 text-sm text-red-500">พื้นที่สำหรับลบ</span>
                </div>
            </div>

            <div>
                <h3 class="text-red-600 mb-4 text-2xl">
                    ลบรายการปัญหา
                    <p class="text-gray-800 text-xl">
                        การลบปัญหานี้จะทำให้ปัญหาหายไปอย่างถาวรโปรดระวังเป็นพิเศษ!
                    </p>
                </h3>

                <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            ใส่ชื่อรายการปัญหาเพื่อลบปัญหา
                        </label>
                        <input type="text" name="title" id="title"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="" required>
                    </div>
                    <button class="app-button red" type="submit">DELETE</button>
                </form>
            </div>
        </section>
    @endcan

@endsection
