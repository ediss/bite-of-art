<div class="table-responsive">
        <table class="table table-striped table-hover" style="table-layout:fixed;">
          <thead>
            <tr>
              <th style="width:2%">#</th>
              <th></th>
              <th>Name</th>
              <th>From - To</th>
              <th>Event place</th>
              <th>Event media link</th>
              <th>Gallerist</th>
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
                    <td><img src = "{{ $event->event_cover }}" class="img-fluid"></td>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->event_open }} <br/> {{ $event->event_closed }}</td>
                    <td>{{ $event->event_place }}</td>
                    
                    {{-- if isset --}}
                    {{-- <td>

                        <img src = "{{asset('images/galleries/'.$event->event_img_1) }}" class="img-fluid"> <p>{{ $event->event_img_1_desc }}</p>
                        <img src = "{{ $event->event_img_2 }}" class="img-fluid"> <p>{{ $event->event_img_2_desc }}</p>
                        <img src = "{{ $event->event_img_3 }}" class="img-fluid"> <p>{{ $event->event_img_3_desc }}</p>
                    </td> --}}

                    <td><a href= "{{ $event->event_media }}">{{ substr($event->event_media, 0, 45) }}</a> <br/> {{ $event->event_media_des }}</td>
                    {{-- <td>{{ $event->event_note }}</td> --}}

                    <td> {{ $event->user->name }}<br> {{ $event->user->gallery_name }}</td>

                      <td>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input event_id"
                          name="event_id2" data-id="{{ $event->id }}" id="customSwitch2_{{ $event->id }}" {{ $event->approved == 1 ? 'checked' : '' }}>
                          <label class="custom-control-label" for="customSwitch2_{{ $event->id }}"></label>

                        </div>
                      </td>


                    <td>

                      <a class="text-primary  js-modal mb-5" data-modalid='update_event'
                      data-modaltitle="Update Event: {{$event->event_name}}"
                      submit_button='js-submit'
                      data-url="{{ route('moderator.event.update', ['id' => $event->id]) }}" data-savetext="Save">
                      <i class="fa fa-2x fa-edit"></i>
                  </a>
                      {{-- <a class="text-primary  js-modal mb-5" data-modalid='add_backoffice_user'
                          data-modaltitle="Izmena pacijenta: {{'name'}}"
                          data-url="" data-savetext="Sačuvaj">
                          <i class="fa fa-2x fa-edit"></i>
                      </a> --}}
                      {{-- <a class="text-primary  js-modal mb-5" data-modalid='update_event'
                      data-modaltitle="Update Event: {{$event->event_name}} |Gallery: {{ $event->user->gallery_name }} | Gallerist: {{ $event->user->name }}"
                      submit_button='js-submit'
                      data-url="{{ route('moderator.event.artist.update', ['id' => $event->id]) }}" data-savetext="Save">
                      <i class="fa fa-2x fa-expand"></i>
                  </a> --}}

                    <a class="text-primary all-event-data" event_id= {{ $event->id }}>
                      <i class="fa fa-2x fa-expand"></i>
                  </a>
                      
                  </td>

                 </tr>
              @endforeach
          </tbody>
        </table>
      </div>