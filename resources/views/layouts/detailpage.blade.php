@extends('navigation.nav')

@section('content')

@push('css')
    @livewireStyles
@endpush

@push('js')
    @livewireScripts
@endpush


<section class="bg-zinc-0 dark:bg-zinc-950 px-5 pt-5">
    <div class="max-w-7xl mx-auto p-4">
        <div class="flex flex-col lg:flex-row">

            <!-- Main Content -->
            <div class="lg:w-2/3 mt-5">
                <div class="bg-zinc-100 p-6 rounded-lg shadow-md dark:bg-zinc-900 border-none">
                
                    <!-- Gambar pertama -->
                    <div class="flex justify-center mb-4 mt-3">
                        <img class="rounded-lg w-50 h-50" src="{{ $Soft->getFirstMediaUrl('icon') }}" alt="{{ $Soft->getFirstMediaUrl('icon') }}" />
                    </div>

                     <h1 class="text-2xl text-center font-bold mb-2 text-zinc-950 dark:text-zinc-50">
                        {{ $Soft->name }} 
                    </h1>
                    <h5 class="text-md text-center mx-3 text-amber-500">{{ $Soft->os->name}}</h5>
                    <h5 class="text-md italic text-center mb-5 mt-2 text-zinc-400">Version : {{ $Soft->version }}</h5>


                    <div class="porse md:prose-sm lg:prose-sm mb-4 text-justify px-3 text-zinc-950 dark:text-zinc-50" >
                        <p>{!! str($Soft->description)->sanitizeHtml() !!}</p>
                    </div>
                    
                    <!-- Gambar kedua -->
                    <img alt="{{ $Soft->getFirstMediaUrl('image') }}" class="w-full rounded-lg mb-2" height="400" src="{{ $Soft->getFirstMediaUrl('image') }}" width="600" />
                    <!-- Deskripsi gambar -->
                    <p class="text-center mb-4 text-zinc-400 italic">
                        Soft24 Digital asset !!
                    </p>

                    <div class="porse md:prose-sm lg:prose-sm px-3 text-justify list-disc list-inside text-zinc-950 dark:text-zinc-50 ">
                            {!! str($Soft->how_install)->sanitizeHtml() !!}
                    </div>

                    <div class="justify-items-center flex-row bg-zinc-50 dark:bg-zinc-950 h-52 mt-5">
                        <h2 class="text-lg font-bold mb-4 pt-4 uppercase text-zinc-950 dark:text-amber-500">
                            Link Download Resmi
                        </h2>
                        <div  >
                            <a href="/dwonload/{{ $Soft->slug }}" type="button" class=" bg-amber-500  hover:bg-amber-600 text-white dark:text-white font-bold py-2 px-4 rounded-lg mb-4">
                                Download
                            </a>
                        </div>

                        <span  class="text-sm text-center text-zinc-400 italic">
                            Note : Link Download Akan Muncul Setelah Iklan Selesai
                        </span>

                    </div>
                    
                    @livewire('Software.coment', ['id' => $Soft->id])

                </div>
            </div>

            <!-- Sidebar -->

            <div class="lg:w-1/3 lg:pl-8 lg:mt-0 mt-5">  
                    
                <div class="bg-zinc-100 dark:bg-zinc-900 p-6 rounded-lg shadow-md sticky top-24 w-auto z-0" >
                    <h2 class="text-lg font-bold mb-4 uppercase text-zinc-950 dark:text-amber-500">
                    Recomend For You
                    </h2>

                <div class="space-y-4">
                    @foreach ($relatedSoftware as $Soft)
                    <div class="flex items-start">
                        <a href="/detail/{{ $Soft->slug }}">
                            <img alt="{{ $Soft->getFirstMediaUrl('icon') }}" class="w-16 h-16 rounded-lg mr-4 flex-shrink-0" height="100" src="{{ $Soft->getFirstMediaUrl('icon') }}" width="100"/>
                        </a>
                        <a href="/detail/{{ $Soft->slug }}" class="inline-flex items-center font-small hover:no-underline w-full">
                            <h3 class="mb-2 mx-3 text-md font-bold leading-tight text-zinc-950 dark:text-zinc-50 break-words">
                                {{ $Soft->name }}
                            </h3>
                        </a>
                    </div>
                    @endforeach
                </div>

                
            </div>
            
        </div>
    </div>
</section>

    <aside aria-label="New Latest Software" class=" py-8 lg:py-10 bg-zinc-100 dark:bg-zinc-900 ">
      <div class="px-3 mx-auto max-w-screen-xl">
          <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">New Update</h2>
    
          <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-6">
              @foreach ($newSoftware as $Soft2)
              <article class="max-w-xs">
                    <a href="/detail/{{ $Soft->slug }}" class="inline-flex items-center font-medium text-zinc-950 dark:text-zinc-50 hover:no-underline">
                        <img src="{{ $Soft2->getFirstMediaUrl('icon') }}" class="mb-3 rounded-lg" alt="Image 1">
                    </a>
                    <a href="/detail/{{ $Soft->slug }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:no-underline">
                        <h2 class="mb-2 text-xl font-bold leading-tight text-zinc-950 dark:text-zinc-50">
                            {{ $Soft2->name  }}
                        </h2>
                    </a>
              </article>
              @endforeach
            </div>
    
      </div>
    </aside>

@endsection