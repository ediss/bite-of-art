@extends('layout.app')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />

@endsection

@section('content')
<div class="col-md-12 ">
    <form action="">
        <div class="row">
            <div class="col-md-12 border-top border-bottom h-100px align-middle text-center">

                <div class="col-md-10 offset-1">
                    <div class="row ">
                        <div class="form-group col-1 text-right">
                            <i class="fa fa-floppy-o fa-2x mr-3 save_event" aria-hidden="true"></i>
                            <i class="fa fa-pencil-square-o fa-2x mt-1 edit_event" aria-hidden="true"></i>
                        </div>

                        <div class="form-group col-4">
                            <input type="text" class="form-control border-0" placeholder="Event name">
                        </div>

                        <div class="form-group col-2">
                            <input type="text" name="daterange" class="form-control js-datepicker-range border-0"
                                value="{{ Request::get('daterange') }}">

                        </div>

                        <div class="form-group col-5 text-right">
                            <button type="button" class="btn btn-outline-dark font-weight-bold add_artist d-none">ADD
                                ARTIST</button>

                        </div>
                    </div>
                </div>
                {{-- <button type="button" name="add_artist" class="btn btn-success mt-2 add_artist">Dodaj umetnika</button> --}}

            </div>

            <div class = "event-wraper col-12">
                <div class="col-md-12 mt-3">
                    <div class="col-md-10 offset-1">
                        <div class="row ">
                            <div class="form-group col-2 text-left">
                                <div class="upload-btn-wrapper">
                                    <button class="my-btn">Upload Cover</button>
                                    <input type="file" name="myfile" />
                                </div>
                            </div>
    
                            <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="exampleFormControlTextarea1" ></textarea>
                            </div>
                        </div>
                    </div>
    
    
                </div>
    
                <div class="col-md-12 mt-3">
                        <div class="col-md-10 offset-1">
                            <div class="row ">
                                <div class="form-group col-2 text-left">
                                    <div class="upload-btn-wrapper">
                                        <button class="my-btn">Optional photo#1</button>
                                        <input type="file" name="myfile" />
                                    </div>
                                </div>
    
                                <div class="form-group col-10">
                                        <textarea class="form-control border-0" id="exampleFormControlTextarea1" ></textarea>
                                </div>
                            </div>
                        </div>
    
    
                </div>
    
                        <div class="col-md-12 mt-3">
                            <div class="col-md-10 offset-1">
                                <div class="row ">
                                    <div class="form-group col-2 text-left">
                                        <div class="upload-btn-wrapper">
                                                <button class="my-btn">Optional photo#2</button>
                                                <input type="file" name="myfile" />
                                        </div>
                                    </div>
    
                                    <div class="form-group col-10">
                                            <textarea class="form-control border-0" id="exampleFormControlTextarea1" ></textarea>
                                    </div>
                                </div>
                            </div>
    
    
                        </div>
    
                            <div class="col-md-12 mt-3">
                                <div class="col-md-10 offset-1">
                                    <div class="row ">
                                        <div class="form-group col-2 text-left">
                                            <div class="upload-btn-wrapper">
                                                    <button class="my-btn">Optional photo#3</button>
                                                    <input type="file" name="myfile" />
                                            </div>
                                        </div>
    
                                        <div class="form-group col-10">
                                                <textarea class="form-control border-0" id="exampleFormControlTextarea1" ></textarea>
                                        </div>
                                    </div>
                                </div>
    
    
                            </div>
    
                            <div class="col-md-12 mt-3">
                                <div class="col-md-10 offset-1">
                                    <div class="row ">
    
    
                                        <div class="form-group col-4">
                                            <input type="text" class = "form-control  border-top-0 border-left-0 border-right-0" placeholder="Paste url">
                                        </div>
                                    </div>
                                </div>
    
    
                            </div>
    
                            <div class="col-md-12 mt-3">
                                <div class="col-md-10 offset-1">
                                    <div class="row ">
                                        <div class="form-group col-1">
                                            <label for="">Note:</label>
                                        </div>
                                        <div class="form-group col-11">
                                            <textarea class="form-control border-0"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>


            <div class="col-md-12 border-top border-bottom h-100px align-middle text-center d-none" id="artist" style="background-color:#cccccc">
                <div class="col-md-10 offset-1">
                    <div class="row ">
                        <div class="form-group col-1 text-right">
                            <i class="fa fa-floppy-o fa-2x mr-3 save_event" aria-hidden="true"></i>
                            <i class="fa fa-pencil-square-o fa-2x mt-1 edit_event" aria-hidden="true"></i>
                        </div>

                        <div class="form-group col-4">
                            <input type="text" class="form-control border-0" placeholder="Artist name">
                        </div>

                        <div class="form-group col-2">
                           

                        </div>

                        <div class="form-group col-5 text-right">
                            <button type="button" class="btn btn-outline-dark font-weight-bold add_artist d-none">ADD
                                ARWORK</button>

                        </div>
                    </div>
                </div>
                {{-- <button type="button" class="btn btn-success mt-2 save_artist btn-block">Sacuvaj umetnika</button> --}}

            </div>
            <div class = "artist-wraper col-12 d-none">
                <div class="col-md-12 mt-3">
                    <div class="col-md-10 offset-1">
                        <div class="row ">
                            <div class="form-group col-2 text-left">
                                <div class="upload-btn-wrapper">
                                    <button class="my-btn">Upload Cover</button>
                                    <input type="file" name="myfile" />
                                </div>
                            </div>
    
                            <div class="form-group col-10">
                                    <textarea class="form-control border-0" id="exampleFormControlTextarea1" ></textarea>
                            </div>
                        </div>
                    </div>
    
    
                </div>
    
                <div class="col-md-12 mt-3">
                        <div class="col-md-10 offset-1">
                            <div class="row ">
                                <div class="form-group col-2 text-left">
                                    <div class="upload-btn-wrapper">
                                        <button class="my-btn">Optional photo#1</button>
                                        <input type="file" name="myfile" />
                                    </div>
                                </div>
    
                                <div class="form-group col-10">
                                        <textarea class="form-control border-0" id="exampleFormControlTextarea1" ></textarea>
                                </div>
                            </div>
                        </div>
    
    
                </div>
    
                        <div class="col-md-12 mt-3">
                            <div class="col-md-10 offset-1">
                                <div class="row ">
                                    <div class="form-group col-2 text-left">
                                        <div class="upload-btn-wrapper">
                                                <button class="my-btn">Optional photo#2</button>
                                                <input type="file" name="myfile" />
                                        </div>
                                    </div>
    
                                    <div class="form-group col-10">
                                            <textarea class="form-control border-0" id="exampleFormControlTextarea1" ></textarea>
                                    </div>
                                </div>
                            </div>
    
    
                        </div>
    
                            <div class="col-md-12 mt-3">
                                <div class="col-md-10 offset-1">
                                    <div class="row ">
                                        <div class="form-group col-2 text-left">
                                            <div class="upload-btn-wrapper">
                                                    <button class="my-btn">Optional photo#3</button>
                                                    <input type="file" name="myfile" />
                                            </div>
                                        </div>
    
                                        <div class="form-group col-10">
                                                <textarea class="form-control border-0" id="exampleFormControlTextarea1" ></textarea>
                                        </div>
                                    </div>
                                </div>
    
    
                            </div>
    
                            <div class="col-md-12 mt-3">
                                <div class="col-md-10 offset-1">
                                    <div class="row ">
    
    
                                        <div class="form-group col-4">
                                            <input type="text" class = "form-control  border-top-0 border-left-0 border-right-0" placeholder="Paste url">
                                        </div>
                                    </div>
                                </div>
    
    
                            </div>
    
                            <div class="col-md-12 mt-3">
                                <div class="col-md-10 offset-1">
                                    <div class="row ">
                                        <div class="form-group col-1">
                                            <label for="">Note:</label>
                                        </div>
                                        <div class="form-group col-11">
                                            <textarea class="form-control border-0"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>


        </div>

        {{-- <button type="button" class="btn btn-primary btn-block mt-5">Save</button> --}}



    </form>
</div>
@endsection

@section('footer-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $('.js-datepicker-range').daterangepicker({
            // opens: 'left',
            locale: {
            format: 'YYYY.MM.DD'
        },

        });

        
    // var artists = [];
        var artists = [];
        var artwork = [];
        
  

        $( ".save_event" ).click(function() {
            $( ".event-wraper" ).animate({
                top: '-50vw'
            }, 2000, function() {
                $('.event-wraper').addClass('d-none');

                $('.add_artist').removeClass('d-none');
            });
        });

        $( ".edit_event" ).click(function() {
            $('.event-wraper').removeClass('d-none');
            $( ".event-wraper" ).animate({
                top: '0'
            }, 2000, function() {
                $('#artist').addClass('d-none');
                $('.add_artist').addClass('d-none');

                

            });
        });


        $('.add_artist').click(function() {
            $('#artist').removeClass('d-none').addClass('fadeInDown animation-duration');
            $('.artist-wraper').removeClass('d-none').addClass('fadeInDown animation-duration');
        });



        $( ".add_artwork" ).on( "click", function() {
            $('#artwork').removeClass('d-none');
        });

        $('.save_artwork').click(function() {

            artwork.push({
                "artwork" : $("input[type=text][name=artwork]").val(),
                "artwork_desc" : $("input[type=text][name=artwork_desc]").val()
            });

            $('#artwork').find(':input').val('');




        });

        $( ".save_artist" ).on( "click", function() {
            artists.push({
                "artist_name" : $("input[type=text][name=artist_name]").val(),
                "artist_state" : $("input[type=text][name=artist_state]").val(),
                "artwork" : artwork
            });

            artwork = [];

            $(':input').val('')

            //artists.push(artist);


        });


</script>
@endsection