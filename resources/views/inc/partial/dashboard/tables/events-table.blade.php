<div class="table-responsive"> 
        <table class="table table-striped table-hover" >
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
                    <td>{{ substr($event->event_description, 0, 100) }}</td>
                    {{-- <td>{{ $event->srb_event_description }}</td>
                    <td>{{ $event->esp_event_description }}</td>
                    <td>{{ $event->slo_event_description }}</td> --}}
                    <td><img src = "{{ $event->cover }}" class="img-fluid"></td>
                    {{-- if isset --}}
                    {{-- <td>
                        
                        <img src = "{{asset('images/galleries/'.$event->event_img_1) }}" class="img-fluid"> <p>{{ $event->event_img_1_desc }}</p>
                        <img src = "{{ $event->event_img_2 }}" class="img-fluid"> <p>{{ $event->event_img_2_desc }}</p>
                        <img src = "{{ $event->event_img_3 }}" class="img-fluid"> <p>{{ $event->event_img_3_desc }}</p>
                    </td> --}}

                    <td>{{ $event->event_media }} <br/> {{ $event->event_media_des }}</td>
                    {{-- <td>{{ $event->event_note }}</td> --}}

                    <td>{{ $event->gallerist_id }}</td>
                    {{-- <td>{{ $event->nfc_tag }}</td> --}}
                    <td>yes/no</td>
                  
                 </tr>
              @endforeach
          </tbody>
        </table>
      </div>