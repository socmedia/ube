<div class="rev_slider_wrapper">
    <div class="rev_slider" id="slider-1" data-version="5.0">
        <ul>
            @foreach ($banners as $banner)
            <li data-fstransition="fade" data-transition="fade" data-easein="default" data-easeout="default"
                data-slotamount="1" data-masterspeed="1200" data-delay="8000" data-title="{{ $banner->name }}">
                @if ($banner->banner_type === 'image')
                <img loading="{{ $loop->first ? 'eager' : 'lazy' }}" src="{{url($banner->media_path)}}"
                    alt="{{$banner->alt}}" data-bgrepeat="no-repeat" data-bgfit="cover" data-bgparallax="7"
                    class="rev-slidebg" loading="{{ $loop->first ? 'eager' : 'lazy' }}" />
                @endif

                {{-- @if ($banner->banner_type === 'video')
                <video class="lazy" controls preload="auto" preload="none" poster="{{url($banner->thumbnail)}}"
                    data-setup="{}">
                    <source data-src="{{url($banner->media_path)}}" type="video/mp4" />
                </video>
                @endif --}}
            </li>
            @endforeach

        </ul>
    </div>
</div>
