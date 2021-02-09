<div class="row el-element-overlay">
    @if(@$resources)
    @foreach($resources as $resource)
        <div class="col-lg-3 col-md-6 resource-uploads">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        @php($img_url = Storage::disk('public')->url($resource->filepath))
                        <img src="{{ $img_url }}" alt="{{ $resource->altval }}" width="200">
                    </div>
                    <div class="el-card-content">
                        {!! Form::text("altval", $resource->altval, ['class' => 'form-control', 'placeholder' => 'Alt value', 'id' => 'alt-value-' . $resource->id]) !!}
                        <div class="mt-2">
                            <button type="button" class="btn btn-sm btn-primary" data-target="#crop_image" data-toggle="modal" data-id="{{ $resource->id }}" data-img="{{ $img_url }}">Crop</button>
                            <button type="button" class="btn btn-sm btn-success btn-save-alt" data-id="{{ $resource->id }}">Save</button>
                            <button type="button" class="btn btn-sm btn-danger btn-delete-resource" data-id="{{ $resource->id }}">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @else
    @foreach($session_files as $key=>$session_file)
        <div class="col-lg-3 col-md-6 resource-uploads">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        @php($img_url = Storage::disk('public')->url($session_file))
                        <img src="{{ $img_url }}"  width="200">
                    </div>
                    <div class="el-card-content">
                        {!! Form::text("altval", '', ['class' => 'form-control', 'placeholder' => 'Alt value', 'id' => 'alt-value-' . $key]) !!}
                        <div class="mt-2">
                            <button type="button" class="btn btn-sm btn-primary" data-target="#crop_image" data-toggle="modal" data-id="" data-session-id ={{ $key }} data-img="{{ $img_url }}">Crop</button>
                            <button type="button" class="btn btn-sm btn-success btn-save-alt" data-id="" data-session-id ={{ $key }}>Save</button>
                            <button type="button" class="btn btn-sm btn-danger btn-delete-resource" data-id=""  data-session-id ={{ $key }}>Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif
</div>
