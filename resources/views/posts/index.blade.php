@extends('layouts.app')
@section('title')
    {{ __('Home') }}
@endsection
@section('content')
    <!-- ====== Banner Section Start -->
    <div
        class="
        relative
        z-10
        pt-[120px]
        md:pt-[130px]
        lg:pt-[160px]
        pb-[100px]
        bg-black
        overflow-hidden
      "
    >
        <div class="container">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4">
                    <div class="text-center">
                        <h1 class="font-semibold text-white text-4xl">{{ __('Blog') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div>
        <span class="absolute top-0 left-0 z-[-1]">
          <svg
              width="495"
              height="470"
              viewBox="0 0 495 470"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
          >
            <circle
                cx="55"
                cy="442"
                r="138"
                stroke="white"
                stroke-opacity="0.04"
                stroke-width="50"
            />
            <circle
                cx="446"
                r="39"
                stroke="white"
                stroke-opacity="0.04"
                stroke-width="20"
            />
            <path
                d="M245.406 137.609L233.985 94.9852L276.609 106.406L245.406 137.609Z"
                stroke="white"
                stroke-opacity="0.08"
                stroke-width="12"
            />
          </svg>
        </span>
            <span class="absolute top-0 right-0 z-[-1]">
          <svg
              width="493"
              height="470"
              viewBox="0 0 493 470"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
          >
            <circle
                cx="462"
                cy="5"
                r="138"
                stroke="white"
                stroke-opacity="0.04"
                stroke-width="50"
            />
            <circle
                cx="49"
                cy="470"
                r="39"
                stroke="white"
                stroke-opacity="0.04"
                stroke-width="20"
            />
            <path
                d="M222.393 226.701L272.808 213.192L259.299 263.607L222.393 226.701Z"
                stroke="white"
                stroke-opacity="0.06"
                stroke-width="13"
            />
          </svg>
        </span>
        </div>
    </div>
    <!-- ====== Banner Section End -->

    <!-- ====== Products Section Start -->
    <section class="pt-20 lg:pt-[120px] pb-10 lg:pb-20">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                @foreach($posts as $post)
                    @if(!blank($post->url) && $post->published)
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="wow fadeInUp group mb-10" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s;">
                            @if(!blank($post->image_url))
                            <div class="mb-8 overflow-hidden rounded">
                                @if ($post->image_url)
                                <a href="{{ LaravelLocalization::localizeUrl($post->url) }}" class="block">
                                    <img src="{{ $post->image_url }}" alt="image" class="w-full transition group-hover:rotate-6 group-hover:scale-125">
                                </a>
                                @endif
                            </div>
                            @endif
                            <div>
                                <span class="mb-5 inline-block rounded bg-primary py-1 px-4 text-center text-xs font-semibold leading-loose text-white">
                                  {{ $post->humanized_created_at }}
                                </span>
                                <h3>
                                    <a href="{{ LaravelLocalization::localizeUrl($post->url) }}" class="mb-4 inline-block text-xl font-semibold text-dark hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <p class="text-base text-body-color">
                                    {!! $post->short_description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- ====== Products Section End -->
@endsection
