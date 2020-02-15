<div class="table-responsive"> 
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>E-mail</th>
              <th>Approved?</th>
            </tr>
          </thead>
          <tbody>
              @php $counter = 0; @endphp
              @foreach($gallerists as $gallerist)
                @php $counter++; @endphp
                <tr>
                    <th scope="row">{{ $counter }}</th>
                    <td>{{ $gallerist->name }}</td>
                    <td>{{ $gallerist->email }}</td>
                    <td>yes/no</td>
                 </tr>
              @endforeach
          </tbody>
        </table>
      </div>