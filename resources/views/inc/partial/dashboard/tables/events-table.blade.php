<div class="table-responsive"> 
        <table class="table table-striped table-hover" style="table-layout:fixed;">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Date open</th>
              <th>Date closed</th>
              <th>Event place</th>
              <th>Event description</th>
              {{-- <th>Event description (SRB)</th>
              <th>Event description (ESP)</th>
              <th>Event description (SLO)</th> --}}
              <th>Cover photo</th>
              {{-- <th>Event images</th> --}}
              <th>Event media link</th>
              {{-- <th>Event note</th> --}}
              <th>Gallerist</th>
              {{-- <th>NFC Tag</th> --}}
              <th>Approved</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
              @php $counter = 0; @endphp
              @foreach($events as $event)
                @php $counter++; @endphp
                <tr>
                    <th scope="row">{{ $counter }}</th>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->event_open }}</td>
                    <td>{{ $event->event_closed }}</td>
                    <td>{{ $event->event_place }}</td>
                    <td>{{ substr($event->event_description, 0, 50) }}...</td>
                    {{-- <td>{{ $event->srb_event_description }}</td>
                    <td>{{ $event->esp_event_description }}</td>
                    <td>{{ $event->slo_event_description }}</td> --}}
                    <td><img src = "{{ $event->event_cover }}" class="img-fluid"></td>
                    {{-- if isset --}}
                    {{-- <td>
                        
                        <img src = "{{asset('images/galleries/'.$event->event_img_1) }}" class="img-fluid"> <p>{{ $event->event_img_1_desc }}</p>
                        <img src = "{{ $event->event_img_2 }}" class="img-fluid"> <p>{{ $event->event_img_2_desc }}</p>
                        <img src = "{{ $event->event_img_3 }}" class="img-fluid"> <p>{{ $event->event_img_3_desc }}</p>
                    </td> --}}

                    <td><a href= "{{ $event->event_media }}">{{ $event->event_media }}</a> <br/> {{ $event->event_media_des }}</td>
                    {{-- <td>{{ $event->event_note }}</td> --}}

                    <td> {{ $event->gallerist_id }}</td>
                    {{-- <td>{{ $event->nfc_tag }}</td> --}}
                    @if($event->approved == 0)
                      <td><i class="fa fa-2x fa-times-circle"></i> <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="" id="customSwitch_{{ $event->id }}">
                        <label class="custom-control-label" for="customSwitch_{{ $event->id }}"></label>
                        <input type="hidden" class="event_id" name="event_id" value= {{ $event->id }}>
                      </div></td>
                    @else
                      <td><i class="fa fa-2x fa-check"></i></td>
                    @endif

                    <td>
                      
                      <a class="text-primary  js-modal mb-5" data-modalid='add_backoffice_user'
                      data-modaltitle="Update Event: {{$event->event_name}}"
                      data-url="{{ route('moderator.event.update', ['id' => $event->id]) }}" data-savetext="Save">
                      <i class="fa fa-2x fa-edit"></i>
                  </a>
                      {{-- <a class="text-primary  js-modal mb-5" data-modalid='add_backoffice_user'
                          data-modaltitle="Izmena pacijenta: {{'name'}}"
                          data-url="" data-savetext="Sačuvaj">
                          <i class="fa fa-2x fa-edit"></i>
                      </a> --}}
                      <a href="" class="dashtext-2 js-delete-patient ml-2" data-id="{{ 1 }}"> <i class="fa fa-2x fa-expand"></i></i> </a>
                  </td>
                  
                 </tr>
              @endforeach
          </tbody>
        </table>
      </div>