<a target="_blank"href="{{route('add.new.article', app()->getLocale())}}" class="btn btn-dark p-3">Add article <i class="fa fa-plus"></i></a>
<div class="table-responsive">
    
    <table class="table table-striped table-hover" style="table-layout:fixed;">
        <thead>
            <tr>
                <th style="width:2%">#</th>
                <th></th>
                <th>Name</th>
                <th>Date</th>
                <th>Text</th>
                <th>Media link</th>
                <th>Note</th>
                <th>User</th>
                <th>Approved?</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 0; @endphp
            @foreach($news as $article)
            @php $counter++; @endphp
            <tr>
                <td scope="row">{{ $counter }}</td>
                <td><img src="{{ url($article->article_cover) }}" class="img-fluid"></td>
                <td>{{ $article->article_name }}</td>
                <td>{{ $article->article_open }}</td>
                @php $article_desc = explode(' ', $article->article_description);
                    $first_part = implode(" ", array_splice($article_desc, 0, 2));
                    
                @endphp
                <td>{{ $first_part }}</td>
                <td>
                    @if($article->article_media != "")
                        <a target="_blank" href="{{ $article->article_media }}">See article media</a>
                    @endif
                    </td>
                <td>{{ $article->article_note }}</td>
                <td>{{ $article->user->name }}</td>
                <td>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input article_id" name="article_id"
                            data-id="{{ $article->id }}" id="customSwitch_{{ $article->id }}"
                            {{ $article->approved == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customSwitch_{{ $article->id }}"></label>

                    </div>
                </td>


                <td>
                    <a class="text-dark btn btn-info  js-modal mb-5" data-modalid='add_images_or_video_to_article'
                        data-modaltitle="Update Article: {{$article->article_name}}"
                        submit_button='my-js-submit'
                        data-url="{{ route('moderator.article.additional', ['language' => app()->getLocale(), 'id' => $article->id ]) }}" data-savetext="Save">
                        Additional
                    </a>

                </td>

                <td>

                    <a class="text-white"
                        href="{{ route('moderator.article.update', ['id' => $article->id,  app()->getLocale()]) }}">
                        <i class="fa fa-2x fa-edit"></i>
                    </a>

                    <a class="text-primary ml-3"
                        href="{{ route('moderator.article.delete', ['id' => $article->id,  app()->getLocale()]) }}"  
                            onclick="return confirm('ARE YOU SURE?');">
                        <i class="fa fa-2x fa-trash"></i>

                    </a>


                    {{-- <a href="" class="dashtext-2 js-delete-patient ml-2" data-id="{{ 1 }}"> <i
                            class="fa fa-2x fa-expand"></i></i> </a> --}}
                </td>

                <td>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>