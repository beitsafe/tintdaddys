<div class="row row-cols-1 row-cols-md-4">
    @if(@$resources)
        @foreach($resources as $resource)
            <div class="col mb-4 resource-uploads">
                <div class="card h-100">
                    @php
                        $fileUrl = Storage::disk('public')->url($resource->filepath);
                        $extension = pathinfo($fileUrl)['extension'];
                        $isImage = in_array($extension,['jpg','jpeg','gif','png','svg']);
                        $isPdf = in_array($extension,['pdf']);
                    @endphp
                    @if($isImage)
                        <img class="card-img-top" src="{{ $fileUrl }}" alt="{{ $resource->altvalue }}">
                    @endif
                    @if($isPdf)
                        <object class="card-img-top" data="{{ $fileUrl }}" type="application/pdf" height="50%">
                            <p>Can't preview uploaded pdf</p>
                        </object>
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::text("altvalue", $resource->altvalue, ['class' => 'form-control', 'placeholder' => 'Alt value', 'id' => 'alt-value-' . $resource->id]) !!}
                        </div>
                        <div class="form-group mb-0">
                            <label for="{{ "msds-{$resource->id}" }}">
                                MSDS :
                                {!! Form::checkbox("msds", 1, $resource->msds, ['placeholder' => 'Alt value', 'id' => 'msds-' . $resource->id]) !!}
                            </label>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if($isImage)
                            <button type="button" class="btn btn-sm btn-primary" data-target="#crop_image" data-toggle="modal" data-id="{{ $resource->id }}" data-img="{{ $fileUrl }}">Crop</button>
                        @endif
                        <button type="button" class="btn btn-sm btn-success btn-save-alt" data-id="{{ $resource->id }}">Save</button>
                        <button type="button" class="btn btn-sm btn-danger btn-delete-resource float-right" data-id="{{ $resource->id }}">Delete</button>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        @foreach($session_files as $key=>$session_file)
            <div class="col mb-4 resource-uploads">
                <div class="card h-100">
                    @php
                        $fileUrl = Storage::disk('public')->url($session_file);
                        $extension = pathinfo($fileUrl)['extension'];
                        $isImage = in_array($extension,['jpg','jpeg','gif','png','svg']);
                        $isPdf = in_array($extension,['pdf']);
                    @endphp
                    @if($isImage)
                        <img class="card-img-top" src="{{ $fileUrl }}"/>
                    @endif
                    @if($isPdf)
                        <object class="card-img-top" data="{{ $fileUrl }}" type="application/pdf" height="50%">
                            <p>Can't preview uploaded pdf</p>
                        </object>
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::text("altvalue", '', ['class' => 'form-control', 'placeholder' => 'Alt value', 'id' => 'alt-value-' . $key]) !!}
                        </div>
                        <div class="form-group mb-0">
                            <label for="{{ "msds-{$key}" }}">
                                MSDS :
                                {!! Form::checkbox("msds", 1, false, ['placeholder' => 'Alt value', 'id' => 'msds-' . $key]) !!}
                            </label>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if($isImage)
                            <button type="button" class="btn btn-sm btn-primary" data-target="#crop_image" data-toggle="modal" data-id="{{ $key }}" data-img="{{ $fileUrl }}">Crop</button>
                        @endif
                        <button type="button" class="btn btn-sm btn-success btn-save-alt" data-id="{{ $key }}">Save</button>
                        <button type="button" class="btn btn-sm btn-danger btn-delete-resource float-right" data-id="{{ $key }}">Delete</button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
