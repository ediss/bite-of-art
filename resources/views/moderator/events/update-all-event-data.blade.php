@extends('layout.dashboard')

@section('content')
@if(session()->has('message-success'))
    <div class="alert alert-success">
        {{ session()->get('message-success') }}
    </div>
@elseif(session()->has('message-error'))
<div class="alert alert-danger">
    {{ session()->get('message-success') }}
</div>
@endif

@if($artists->count() > 0)
@foreach ($artists as $artist)
<form method="POST" action={{ route('moderator.event.artist.update', ['id' => $event_id, 'language'=>app()->getLocale()]) }} class="mt-5"
    enctype="multipart/form-data">
    @csrf
    <h1 class="text-center">{{$event_name}}</h1>
    <input type="hidden" name="hiden_event_id" class="hidden_event_id" value={{ $event_id }}>




    <div class="form-group mt-5">
        <div class="row">

            <div class="col-md-3">
                <label class="form-control-label"><b>Artist cover</b></label>
                <img src="{{ url($artist->artist_cover) }}" alt="" class="img-fluid">
                <input type="hidden" name="artist_id_hidden" value="{{ $artist->id }}">

            </div>

            <div class="col-md-3">
                <div class="row">
                    <div class="col-12">
                        <label class="form-control-label"><b>Artist Name</b></label>
                        <input type="text" class="form-control" name="new_artist_name"
                            value="{{ $artist->artist_name }}">



                        @if ( $validator && $validator->errors()->first('new_artist_name') )

                        <div class="alert alert-danger mt-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $validator->errors()->first('new_artist_name') }}
                        </div>
                        @endif
                    </div>

                    <div class="col-12 mt-5">
                        <label class="form-control-label"><b>New cover image </b></label>
                        <p><input type="file" name="new_artist_cover" class="form-control" id="new_artist_cover" /></p>
                    </div>
                </div>


            </div>
            <div class="col-md-6">
                <label class="form-control-label"><b>About Artist</b></label>
                <textarea name="new_artist_about" class="form-control" id="" cols="60"
                    rows="10">{{$artist->artist_about}}</textarea>

            </div>
        </div>

    </div>


    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label class="form-control-label"><b>Artist image 1</b></label>
                @if($artist->artist_img_1)
                <p> <img src="{{ $artist->artist_img_1 }}" class="img-fluid"></p>
                @else
                <p class="text-primary"> Not set</p>
                @endif


                <input type="file" name="new_artist_img_1" id="new_artist_img_1" />

            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Artist image 2</b></label>
                @if($artist->artist_img_2)
                <p><img src="{{ $artist->artist_img_2 }}" class="img-fluid"></p>
                @else
                <p class="text-primary"> Not set</p>
                @endif
                <input type="file" name="new_artist_img_2" id="new_artist_img_2" />
            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Artist image 3</b></label>
                @if($artist->artist_img_3)
                <p><img src="{{ $artist->artist_img_3 }}" class="img-fluid"></p>
                @else
                <p class="text-primary"> Not set</p>
                @endif
                <input type="file" name="new_artist_img_3" id="new_artist_img_3" />
            </div>

        </div>

    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <label class="form-control-label"><b>Artist img 1 description</b></label>
                <textarea name="new_artist_img_1_desc" id="new_artist_img_1_desc" cols="30" rows="10"
                    class="form-control">{{ $artist->artist_img_1_desc ? $artist->artist_img_1_desc : ''  }}</textarea>
            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Artist img 2 description</b></label>
                <textarea name="new_artist_img_2_desc" id="new_artist_img_2_desc" cols="30" rows="10"
                    class="form-control">{{ $artist->artist_img_2_desc ? $artist->artist_img_2_desc : ''  }}</textarea>
            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Artist img 3 description</b></label>
                <textarea name="new_artist_img_3_desc" id="new_artist_img_3_desc" cols="30" rows="10"
                    class="form-control">{{ $artist->artist_img_3_desc ? $artist->artist_img_3_desc : ''  }}</textarea>
            </div>

        </div>

    </div>

    <div class="form-group">
        <div class="row">
            @if(isset($artist->artist_media))
            <div class="col-md-4">
                <label class="form-control-label"><b>Artist media</b></label>
                <a href="{{ $artist->artist_media }}">{{ $artist->artist_media }}</a>
            </div>
            @endif

            @if(isset($artist->artist_media_desc))
            <div class="col-md-4">
                <label class="form-control-label"><b>Artist media description</b></label>
                <p>{{ $artist->artist_media_desc ? $artist->artist_media_desc : ''  }}</p>

            </div>
            @endif

            @if(isset($artist->artist_note))
            <div class="col-md-4">
                <label class="form-control-label"><b>Artist note</b></label>
                <p>{{ $artist->artist_note ? $artist->artist_note : ''  }}</p>

            </div>
            @endif

        </div>

    </div>

    <div class="form-group">
        <div class="col-12 text-center" id="accordion_{{ $artist->id }}">
            <div class="row">
                <div class="col-6">

                    <input type="submit" class="btn dashbg-1 btn-lg float-right text-light update-artist-event"
                        value="Update Artist">
                </div>
                <div class="col-6 ">
                    @php $artworks_count = count($artist->artworks)@endphp
                    <a class="btn dashbg-3 text-light btn-lg float-left" data-toggle="collapse"
                        href="#collapseOne_{{ $artist->id }}">
                        Show artworks({{ $artworks_count }})
                    </a>
                </div>
            </div>



        </div>
    </div>
</form>

<!--update artwork-->
<div class="form-group">
    <div id="collapseOne_{{ $artist->id }}" class="collapse" data-parent="#accordion_{{$artist->id}}">

        {{-- @php dd($artist->artworks) @endphp --}}
        @foreach ($artist->artworks as $artwork)
        <form method="POST" action={{ route('moderator.event.artwork.update', ['id' => $artwork->id], app()->getLocale()) }} class="mt-5"
            enctype="multipart/form-data">
            @csrf

            <div class="form-group mt-5">
                <div class="row">

                    <div class="col-md-3">
                        <label class="form-control-label"><b> Artwork cover</b></label>
                        <img src="{{ url($artwork->artwork_cover) }}" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-12">
                                    <label class="form-control-label"><b>Artwork Name</b></label>
                                    <input type="text" name="new_artwork_name" class="form-control"
                                        value={{ $artwork->artwork_name }}>
                            </div>
                            <div class="col-12 mt-5">
                                <label class="form-control-label"><b>New cover image </b></label>
                                <p><input type="file" name="new_artwork_cover" class="form-control"></p>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-control-label"><b>About Artwork</b></label>
                        <textarea name="new_artwork_about" class="form-control" id="" cols="60"
                            rows="10">{{$artwork->artwork_about}}</textarea>
                    </div>

                </div>

            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-control-label"><b>Artwork image 1</b></label>
                        @if($artwork->artwork_img_1)
                        <p> <img src="{{ $artwork->artwork_img_1 }}" class="img-fluid"></p>
                        @else
                        <p class="text-primary"> Not set</p>
                        @endif


                        <input type="file" name="anew_artwork_img_1" id="anew_artwork_img_1" />

                    </div>
                    <div class="col-md-4">
                        <label class="form-control-label"><b>Artwork image 2</b></label>
                        @if($artwork->artwork_img_2)
                        <p><img src="{{ $artwork->artwork_img_2 }}" class="img-fluid"></p>
                        @else
                        <p class="text-primary"> Not set</p>
                        @endif
                        <input type="file" name="anew_artwork_img_2" id="anew_artwork_img_2" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-control-label"><b>Artwork image 3</b></label>
                        @if($artwork->artwork_img_3)
                        <p><img src="{{ $artwork->artwork_img_3 }}" class="img-fluid"></p>
                        @else
                        <p class="text-primary"> Not set</p>
                        @endif
                        <input type="file" name="anew_artwork_img_3" id="anew_artwork_img_3" />
                    </div>

                </div>

            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-control-label"><b>Artwork img 1 description</b></label>
                        <textarea name="new_artwork_image_1_desc" id="new_artwork_image_1_desc" cols="30" rows="10"
                            class="form-control">{{ $artwork->artwork_img_1_desc ? $artwork->artwork_img_1_desc : ''  }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-control-label"><b>Artwork img 2 description</b></label>
                        <textarea name="new_artwork_image_2_desc" id="new_artwork_image_2_desc" cols="30" rows="10"
                            class="form-control">{{ $artwork->artwork_img_2_desc ? $artwork->artwork_img_2_desc : ''  }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-control-label"><b>Artwork img 3 description</b></label>
                        <textarea name="new_artwork_image_3_desc" id="new_artwork_image_3_desc" cols="30" rows="10"
                            class="form-control">{{ $artwork->artwork_img_3_desc ? $artwork->artwork_img_3_desc : ''  }}</textarea>
                    </div>

                </div>

            </div>

            <div class="form-group">
                <div class="row">
                    @if(isset($artwork->artwork_media))
                    <div class="col-md-4">
                        <label class="form-control-label"><b>Artwork media</b></label>
                        <a href="{{ $artwork->artwork_media }}">{{ $artwork->artwork_media }}</a>
                    </div>
                    @endif

                    @if(isset($artwork->artwork_media_desc))
                    <div class="col-md-4">
                        <label class="form-control-label"><b>Artwork media description</b></label>
                        <p>{{ $artwork->artwork_media_desc ? $artwork->artwork_media_desc : ''  }}</p>

                    </div>
                    @endif

                    @if(isset($artwork->artwork_note))
                    <div class="col-md-4">
                        <label class="form-control-label"><b>Artwork note</b></label>
                        <p>{{ $artwork->artwork_note ? $artwork->artwork_note : ''  }}</p>

                    </div>
                    @endif

                </div>

            </div>

            <div class="form-group">
                <div class="col-12 text-center">
                    <input type="submit" class="btn dashbg-1 btn-lg text-light" value="Update Artwork">
                </div>
            </div>
            <hr>
        </form>
        @endforeach


    </div>
</div>
@endforeach
@else
    <p>Event {{$event_name}} dont' have artist(s)</p>
@endif









@endsection