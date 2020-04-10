<div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th style="width:2%">#</th>
        <th></th>
        <th>Name</th>
        <th>Gallerist</th>
        <th>Event media link</th>
        <th>Approved</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @php $counter = 0; @endphp
      @foreach($events as $event)

      @php $counter++; @endphp
      {{-- @php dd($event->artworks) @endphp --}}

      {{-- @php dd($event->artists) @endphp --}}

      <tr>
        <td>{{ $counter }}</td>
        <td style="width:15%"><img src="{{ url($event->event_cover) }}" class="img-fluid">
          <br><br>
          <i class="fa fa-map-marker"></i> {{ $event->event_place }}</td>
        <td>
          {{ $event->event_name }}
          <br><br>
          <i class="fa fa-calendar"></i>
          {{ date('d/m/Y', strtotime($event->event_open)) }} - {{ date('d/m/Y', strtotime($event->event_closed)) }}

        </td>
        <td>
          <i class="fa fa-user-circle"></i>
          {{ $event->user->name }}<br><br>
          <i class="fa fa-image"></i> {{ $event->user->gallery_name }}
        </td>




        <td>
          @if( $event->event_media != "")
          <a target="a_blank" href="{{ $event->event_media }}">link</a>
          <br><br>
          @else
          <p>/</p>
          @endif

          @if($event->event_media_desc != "")
          <a class="text-light  js-modal " data-modalid='display_media_data' href="#"
            data-modaltitle="Event media link data:"
            data-url="{{ route('moderator.event.media.desc', ['language' => app()->getLocale(), 'id' => $event->id ]) }}">
            See description
          </a>
          @endif
        </td>
        {{-- <td>{{ $event->event_note }}</td> --}}


        <td>
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input event_id" name="event_id2" data-id="{{ $event->id }}"
              id="customSwitch2_{{ $event->id }}" {{ $event->approved == 1 ? 'checked' : '' }}>
            <label class="custom-control-label" for="customSwitch2_{{ $event->id }}"></label>

          </div>
        </td>


        <td>

          <div class="row p-0">
            <div class="col-6 p-0">
              <a class="dashtext-4" title="Edit Event"
                href="{{ route('moderator.event.update',  ['id' => $event->id,  app()->getLocale()]) }}">
                <i class="fa fa-2x fa-edit"></i>
              </a>
            </div>
            <div class="col-6 p-0">
              <a class="dashtext-4 all-event-data" title="Artist and Artworks"
                href=" {{ route('moderator.event.artist.update',['id'=>$event->id, 'language'=>app()->getLocale() ]) }}">
                <i class="fa fa-2x fa-expand"></i>
              </a>
            </div>
          </div>




        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>