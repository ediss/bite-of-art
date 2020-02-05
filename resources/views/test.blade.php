@extends('layout.app')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('content')
<div class="col-md-12 h-100px p-0">
    <form action="">
        <div class="row">
            <div class="col-md-12 border-top border-bottom h-100px align-middle text-center">

                <div class="col-md-10 offset-1">
                    <div class="row ">
                        <div class="form-group col-1 text-right">
                            <i class="fa fa-floppy-o fa-2x mr-3" aria-hidden="true"></i>
                            <i class="fa fa-pencil-square-o fa-2x mt-1" aria-hidden="true"></i>
                        </div>

                        <div class="form-group col-4">
                            <input type="text" class="form-control border-0" placeholder="Event name">
                        </div>

                        <div class="form-group col-2">
                            <input type="text" name="daterange" class="form-control js-datepicker-range border-0"
                                value="{{ Request::get('daterange') }}">

                        </div>

                        <div class="form-group col-5 text-right">
                            <button type="button" class="btn btn-outline-dark font-weight-bold add_artist">ADD
                                ARTIST</button>

                        </div>
                    </div>
                </div>
                {{-- <button type="button" name="add_artist" class="btn btn-success mt-2 add_artist">Dodaj umetnika</button> --}}

            </div>

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


            <div class="col-md-8 d-none" id="artist">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Ime umetnika</label>
                        <input type="text" class="form-control" name="artist_name">
                        <label for="">Drzava umetnika</label>
                        <input type="text" class="form-control" name="artist_state">
                        <button type="button" class="btn btn-success mt-2 add_artwork btn-block">Dodaj rad</button>

                    </div>

                    <div class="col-md-6 d-none" id="artwork">
                        <label for="">Dodaj rad za umetnika</label>
                        <input type="text" class="form-control" name="artwork">
                        <label for="">Opis rada</label>
                        <input type="text" class="form-control" name="artwork_desc">

                        <button type="button" class="btn btn-success mt-2 save_artwork btn-block">Sacuvaj rad</button>

                    </div>


                </div>
                <button type="button" class="btn btn-success mt-2 save_artist btn-block">Sacuvaj umetnika</button>

            </div>


        </div>

        <button type="button" class="btn btn-primary btn-block mt-5">Save</button>



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

        $('.add_artist').click(function() {
            $('#artist').removeClass('d-none');
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