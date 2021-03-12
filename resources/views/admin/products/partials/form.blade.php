<div class="row">
    <div class="col">
        <div class="">
            <div class="row">
                <div class="form-group col-md-4">
                    {{ Form::label('name', 'Name *') }}
                    {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-4">
                    {{ Form::label('price', 'Price *') }}
                    {{ Form::text('price', old('price'), ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-4">
                    {{ Form::label('category_id', 'Category *') }}
                    {{ Form::select('category_id', $categories, @$model->category_id, ['class' => 'form-control','placeholder'=>'Select Category']) }}
                </div>


                <div class="form-group col-md-12">
                    {{ Form::label('shortDescription', 'Short Description') }}
                    {{ Form::textarea('shortDescription', old('shortDescription'), ['class' => 'form-control summernote']) }}
                </div>


                <div class="form-group col-md-12">
                    {{ Form::label('body', 'Body *') }}
                    {{ Form::textarea('body', old('body'), ['class' => 'form-control summernote']) }}
                </div>

                <div class="form-group col-md-8">
                    {{ Form::label('extraDescription', 'Extra Description') }}
                    {{ Form::textarea('extraDescription', old('extraDescription'), ['class' => 'form-control summernote']) }}
                </div>
                <div class="form-group col-md-4">

                    <div class="form-group row mt-4">
                        {{ Form::label('inStock', 'In Stock',['class'=>'col-sm-4 col-form-label my-auto']) }}
                        <div class="col-sm-3 my-auto">
                            {{ Form::hidden('inStock', 0,['id'=>'hidden-inStock']) }}
                            <div class="switch">
                                <label>
                                    {{ Form::checkbox('inStock', 1,  old('inStock')) }}<span class="lever switch-col-blue"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        {{ Form::label('istint', 'Is Tint',['class'=>'col-sm-4 col-form-label my-auto']) }}
                        <div class="col-sm-3 my-auto">
                            {{ Form::hidden('istint', 0,['id'=>'hidden-istint']) }}
                            <div class="switch">
                                <label>
                                    {{ Form::checkbox('istint', 1,  old('istint')) }}<span class="lever switch-col-blue"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        {{ Form::label('length', 'Length (mm)',["class"=>"col-sm-4 col-form-label"]) }}
                        <div class="col-sm-8">
                            {{ Form::text('length', old('length'), ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('width', 'Width (mm)',["class"=>"col-sm-4 col-form-label"]) }}
                        <div class="col-sm-8">
                            {{ Form::text('width', old('width'), ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('height', 'Height (mm)',["class"=>"col-sm-4 col-form-label"]) }}
                        <div class="col-sm-8">
                            {{ Form::text('height', old('height'), ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('weight', 'Weight (kg)',["class"=>"col-sm-4 col-form-label"]) }}
                        <div class="col-sm-8">
                            {{ Form::text('weight', old('weight'), ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>

                <div class=" form-group col-md-6">
                    {{ Form::label('sizes', 'Size(s)') }}
                    {{ Form::select('sizes[]', $sizes, old('sizes'), ['class' => 'form-control select2','id'=>'size-select2','multiple']) }}
                </div>

                <div class=" form-group col-md-6">
                    {{ Form::label('shades', 'Shade(s)') }}
                    {{ Form::select('shades[]', $shades, old('shades'), ['class' => 'form-control select2','id'=>'shade-select2','multiple']) }}
                </div>

                <div class="col-12">
                    @php
                        $variants = $model->getSizeShadeVariants();
                    @endphp
                    <table id="size_shade_variation" class="table table-sm table-bordered">
                        <thead>
                        <tr>
                            <td>
                                <span>Shades ↓ </span> / <span>Sizes → </span>
                            @if($variants && $sizes = @$variants['sizes'])
                                @foreach($sizes as $id => $size)
                                    <td date-size="{{ $id }}">{{ $size }}</td>
                                @endforeach
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @if($variants && $shades = @$variants['shades'])
                            @foreach($shades as $shade_id => $shade)
                                <tr data-shade="{{ $shade_id }}">
                                    <td>{{ $shade }}</td>
                                    @foreach($sizes as $size_id => $size)
                                        <td><input type="text" name="variants[{{ $size_id }}][{{ $shade_id }}]" class="form-control" value="{{ @$variants['prices'][$size_id][$shade_id] }}"/></td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class=" form-group col-md-6">
                    {{ Form::label('metaKeywords', 'SEO Keywords (comma separate)') }}
                    {{ Form::textarea('metaKeywords', old('metaKeywords'), ['class' => 'form-control', 'rows'=>"5"]) }}
                </div>

                <div class="form-group col-md-6">
                    {{ Form::label('metaDescription', 'SEO Description') }}
                    {{ Form::textarea('metaDescription', old('metaDescription'), ['class' => 'form-control','rows'=>"5"]) }}
                </div>
            </div>

            <div class="form-group">
                <label>Product Images</label>
                <div class="wrapper">
                    {{--        <div class="dropzone" id="myDropzone"></div>--}}
                    <div class="dropzone" id="dropzone">
                    </div>
                </div>
            </div>

            <div id="uploaded_images"></div>


            <div class="text-center">
                {!! Form::submit( "Submit", ['class' => 'btn btn-success text-right']) !!}
                {!! Html::link('/admin/products', 'Back', ['class' => 'btn btn-secondary']) !!}
            </div>
        </div>
    </div>
</div>

@push('scripts')
    @include('layouts.backPartials.select2_scripts')
    @include('layouts.backPartials.summernote_scripts')

    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/slim.min.css')}}">

    <script src="{{asset('backend/js/dropzone.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/slim.kickstart.min.js')}}" type="text/javascript"></script>
    <script src="//www.jsviews.com/download/jsrender.min.js" type="text/javascript"></script>

    <script id="variantTmpl" type="text/x-jsrender">
        <td><input type="text" name="variants[[[:size]]][[[:shade]]]" class="form-control" /></td>









    </script>

    <script type="text/javascript">
        $.views.settings.delimiters("[[", "]]");
        var id = '{{  @$model->id }}',
            drop = $('#dz-preview-template').html(),
            $variantTable = $('#size_shade_variation');

        function addSizeShade(params) {
            if (params.type == 'SIZE') {
                $variantTable.find('thead tr').append(`<td data-size="${params.value}">${params.text}</td>`);
                $variantTable.find('tbody tr').each(function (e) {
                    $(this).append($("#variantTmpl").render({size: params.value, shade: $(this).data('shade')}));
                });
            }

            if (params.type == 'SHADE') {
                let html = `<td>${params.text}</td>`;
                $variantTable.find('thead tr td:gt(0)').each(function (e) {
                    html += $("#variantTmpl").render({size: $(this).data('size'), shade: params.value});
                });
                $variantTable.find('tbody').append(`<tr data-shade="${params.value}">${html}</tr>`);
            }
        }

        $('#size-select2, #shade-select2').on('select2:select', function (e) {
            let data = e.params.data,
                params = {};
            if ($(this).attr('id') == 'size-select2') {
                params = {type: 'SIZE', text: data.text, value: data.id};
            } else {
                params = {type: 'SHADE', text: data.text, value: data.id};
            }

            addSizeShade(params);
        });

        $("#dropzone").dropzone({
            url: "/upload_dropzone_file",
            // previewTemplate: drop,
            // previewsContainer: "#template-preview",
            maxFilesize: 6,
            acceptedFiles: "image/*,application/pdf",
            params: {'resourceable_id': id, 'resourceable_type': '\App\\Models\\Product'},
            paramName: "file",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            init: function () {
                var myDropzone = this; // closure

                this.on("addedfile", function (file, xhr, formData) {
                    // if (file.status == 'added') {
                    //     $('#suite_attach_modal #attach_size').val(file.size);
                    //     $('#attach-dropzone #drop-area').hide();
                    // }
                });

                this.on("error", function (file, xhr, formData) {
                    console.log('ERROR' + xhr);
                });

                this.on("error", function (jqXHR) {
                    // $('.modal-notify').html(errorMessage(jqXHR));
                });

                this.on("complete", function (file, xhr, formData) {
                    // setTimeout(function () {
                    //     $('.dz-filename span:contains("' + file.name + '")').closest('.dz-preview').fadeOut('10');
                    // }, 5000);
                });

                this.on("queuecomplete", function (file, xhr, formData) {
                    load_uploaded_images();
                });
            }
        });

        Dropzone.autoDiscover = false;

        $(document).ready(function () {
            load_uploaded_images();

            $('body').on('click', '.btn-delete-resource', function (e) {
                var $this = $(this);

                swal("Are you sure?", {
                    type: 'warning',
                    buttons: {
                        cancel: "Cancel",
                        catch: {
                            text: "Yes, delete it",
                            value: "delete",
                        },
                    },
                }).then((value) => {
                    switch (value) {
                        case "delete":
                            if ($this.data('id')) {
                                $.ajax({
                                    method: 'DELETE',
                                    url: '{{ url('admin/resources') }}/' + $this.data('id'),
                                    success: function () {
                                        $this.closest('.resource-uploads').remove();
                                        swal("Deleted!", "Your upload has been deleted.", "success");
                                    },
                                    error: function (jqXhr) {
                                        swal_error(jqXhr);
                                    }
                                });
                            } else {
                                $this.closest('.card').remove();
                                $.ajax({
                                    method: 'DELETE',
                                    url: '{{ url('delete_image') }}/' + $this.data('session-id'),
                                    success: function () {
                                        $this.closest('.resource-uploads').remove();
                                        swal("Deleted!", "Your upload has been deleted.", "success");
                                    },
                                    error: function (jqXhr) {
                                        swal_error(jqXhr);
                                    }
                                });

                            }
                            break;
                    }
                });
            });

            $('body').on('click', '.btn-save-alt', function (e) {
                e.preventDefault();

                var id = $(this).data('id');
                let params = {},
                    endpoint = '{{ route('resources.savealt',':ID') }}';
                if (id) {
                    params.altvalue = $('#alt-value-' + id).val();
                    params.msds = $('#msds-' + id).is(':checked') ? 1 : 0;
                    endpoint = endpoint.replace(':ID', id);
                } else {
                    var session_id = $(this).data('session-id');
                    params.altvalue = $('#alt-value-' + session_id).val();
                    params.msds = $('#msds-' + session_id).is(':checked') ? 1 : 0;
                    params.session_id = true;

                    endpoint = endpoint.replace(':ID', session_id);
                }

                $.post(endpoint, params, function (data) {
                    swal("Success!", "Alt value saved", "success");
                });
            });

            var croppers;
            $('#crop_image').on('shown.bs.modal', function (e) {
                var $this = $(this);

                var rel = $(e.relatedTarget);
                var $img = rel.closest('.el-card-item').find('img');

                var resource_id = rel.data('id');
                var session_id = rel.data('session-id');

                var $slim_elem = '<div class="slim" id="myCropper"> <img src="' + $img.attr('src') + '" alt=""/> <input type="file" name="slim[]"/></div>';
                $this.find('.modal-body').html($slim_elem);

                croppers = new Slim(document.getElementById('myCropper'), {
                    service: '/slim_upload_image',
                    push: true,
                    meta: {'resource-id': resource_id, 'session-id': session_id},
                    didUpload: function (error, data, response) {
                        if (response.status == "success") {
                            setTimeout(function () {
                                $this.modal('hide');
                            }, 3000);

                            $img.attr('src', response.imageurl);
                        }
                    }
                });
            }).on('hidden.bs.modal', function () {
                croppers.slim('destroy');
            });
        });


        function load_uploaded_images() {

            var url = (id) ? '/load_uploaded_files/' + id + '/product' : '/load_uploaded_files/';

            $.ajax({
                method: 'GET',
                url: url,
                success: function (html) {
                    $('#uploaded_images').html(html);
                },
                error: function (jqXhr) {
                }
            });
        }
    </script>
@endpush
