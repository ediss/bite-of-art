<div class="row">
    <div class="col-8 offset-2">
        <h1 for="">Event media file description</h1>
        <p>{{ $event_media_desc }}</p>
    </div>
</div>


@if($event_note !="")
<div class="row">
    <div class="col-8 offset-2">
        <h1 for="">Event note</h1>
        <p>{{ $event_note }}</p>
    </div>
</div>
@endif