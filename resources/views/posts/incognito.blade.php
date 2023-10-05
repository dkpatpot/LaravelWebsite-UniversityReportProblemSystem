@extends('layouts.main')

@section('content')
    <section class="mx-8 font-mono bg-slate-800 rounded-lg px-4 py-6 ring-1 ring-slate-900/5 shadow-xl">
        <h1 class="pl-8 text-2xl mb-6 text-white">
            สร้างรายการปัญหาแบบไม่ระบุตัวตน
        </h1>

        <form  method="POST" enctype="multipart/form-data" action="{{ route('posts.gueststore') }}" >
            @csrf

            <div class="relative z-0 mb-6 w-full group ">
                <label for="title" class="block mb-2 text-sm font-medium text-slate-200 dark:text-gray-300">
                    ชื่อปัญหา
                </label>
                @if ($errors->has('title'))
                    <p class="text-red-500">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <input type="text" name="title" id="title"
                       class="bg-gray-50 border @if($errors->has('title')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('title') }}"
                       placeholder="" required>
            </div>

            {{-- <div class="relative z-0 mb-6 w-full group">
                <label for="tags" class="block mb-2 text-sm font-medium text-slate-200 dark:text-gray-300">
                    หมวดหมู่ (แบ่งโดยใช้ comma ",")
                </label>
                <input type="text" name="tags" id="tags"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('tags') }}"
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
                    รายระเอียดปัญหา
                </label>
                @if($errors->has('description'))
                    <p class="text-red-500">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <textarea rows="4" type="text" name="description" id="description"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          required >{{ old('description') }}</textarea>
            </div>
            <div class="col-md-12">
                           <div class="form-group relative z-0 mb-6 w-full group ">
                               <input type="file" name="image" placeholder="Choose image" id="image" class="rounded-md border border-slate-200 text-slate-200">
                           @error('image')
                               <div class="alert alert-danger mt-1 mb-1 text-red">{{ $message }}</div>
                           @enderror
                           </div>
            </div>
            <div>
                <button class="app-button" type="submit">สร้าง</button>
                <a class="app-button text-slate-200" href="{{ route('posts.create')}}">
                โหมดปกติ
                </a>
            </div>

        </form>
    </section>

@endsection
