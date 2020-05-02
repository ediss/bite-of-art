<div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>E-mail</th>
              <th>Gallery Name</th>
              <th>Gallery Cover</th>
              <th>About Gallery</th>
              <th>Media link</th>
              <th>Cover Letter</th>
              <th>Approved?</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
              @php $counter = 0; @endphp
              @foreach($gallerists as $gallerist)
                @php $counter++;@endphp
                <tr>
                    <th scope="row">{{ $counter }}</th>
                    <td>{{ $gallerist->name }}</td>
                    <td>{{ $gallerist->email }}</td>
                    <td>{{ $gallerist->gallery_name }} <br> {{ $gallerist->city_country }}</td>

                    @if($gallerist->gallery_cover != null)
                      <td><img src = "{{ url($gallerist->gallery_cover) }}" style="max-width:30%;max-height: 30%;"></td>
                    @else
                    <td>/</td>
                    @endif
                    <td>{{ $gallerist->about_gallery }}</td>
                    <td>{{ $gallerist->media_link }}</td>
                    <td>{{ $gallerist->cover_letter }}</td>
                    <td>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input gallerist_id2" name="gallerist_id2"
                        data-id="{{ $gallerist->id }}" id="customSwitch_{{ $gallerist->id }}" {{ $gallerist->approved == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customSwitch_{{ $gallerist->id }}"></label>
                        {{-- <input type="hidden" class="gallerist_id" name="gallerist_id" value= {{ $gallerist->id }}> --}}
                      </div>
                    </td>
                    <td>
                      <a class="  js-modal text-primary" data-modalid='gallerist_update'
                      data-modaltitle="Update Gallerist: {{$gallerist->name}}"
                      submit_button='my-js-submit'
                      data-url="{{ route('moderator.gallerist.update',  ['id' => $gallerist->id,  app()->getLocale()]) }}" data-savetext="Save">
                      <i class="fa fa-2x fa-edit"></i>

                  </a>
                
  
                      {{-- <a href="" class="dashtext-2 js-delete-patient ml-2" data-id="{{ 1 }}"> <i
                              class="fa fa-2x fa-expand"></i></i> </a> --}}
                  </td>
                 </tr>
              @endforeach
          </tbody>
        </table>
      </div>
