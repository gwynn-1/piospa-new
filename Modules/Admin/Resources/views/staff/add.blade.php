@extends('layout')

@section('page_subheader')
    @include('components.subheader', ['title' => 'Khách hàng'])
@stop


@section('content')
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
        }
        #img-upload{
            width: 100%;
        }
    </style>
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">{!! $TITLE !!}
                            </h3>
                        </div>
                    </div>
                </div>
                {!! Form::open(['id'=>'addStaff', 'method' => 'post','enctype'=>"multipart/form-data",'route' => 'staff.add','class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) !!}
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Mã nhân viên
                        </label>
                        <div class="col-lg-3 {{ $errors->has('code') ? ' has-danger' : '' }}">
                            {!! Form::text('code', null, ['id'=>'code','class' => 'form-control m-input', 'placeholder' => 'Nhập mã nhân viên']) !!}
                            @if ($errors->has('code'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('code') }}
                                    </span>
                                <br>
                            @endif
                            <p style="color:red;display:none;" class="error errorCode"></p>

                            <span class="m-form__help">Vui lòng nhập mã nhân viên</span>
                        </div>
                        <label class="col-lg-2 col-form-label ">Chi nhánh</label>
                        <div class="col-lg-3">
                            <select class="form-control" name="store_id">
                                <option value=""> --- Vui lòng chọn chi nhánh ---</option>
                                @foreach($storeOption as $key=>$item)
                                    <option value="{{$key}}">{{$item}}</option>
                                @endforeach
                            </select>
                            <span class="m-form__help">Vui lòng chọn chi nhanh</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Tên nhân viên
                        </label>
                        <div class="col-lg-3 {{ $errors->has('fullname') ? ' has-danger' : '' }}">
                            {!! Form::text('fullname', null, ['id'=>'fullname', 'class' => 'form-control m-input', 'placeholder' => 'Nhập tên nhân viên']) !!}
                            @if ($errors->has('fullname'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('fullname') }}
                                    </span>
                                <br>
                            @endif

                            <span class="m-form__help">Vui lòng nhập đầy đủ tên nhân viên</span>
                        </div>
                        <label class="col-lg-2 col-form-label ">Phòng ban ( bộ phận )</label>
                        <div class="col-lg-3 {{ $errors->has('staff_department_id') ? ' has-danger' : '' }}">
                            <select class="form-control" name="staff_department_id">
                                <option value=""> --- Vui lòng chọn phòng ban ---</option>
                                @foreach($staffDepartmentOption as $key=>$item)
                                    <option value="{{$key}}">{{$item}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('staff_department_id'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('staff_department_id') }}
                                </span>
                                <br>
                            @endif
                            <span class="m-form__help">Vui lòng chọn phòng ban</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Tài khoản
                        </label>
                        <div class="col-lg-3 {{ $errors->has('username') ? ' has-danger' : '' }}">
                            {!! Form::text('username', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập tên tài khoản']) !!}
                            @if ($errors->has('username'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('username') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">Vui lòng nhập tài khoản</span>
                        </div>
                        <label class="col-lg-2 col-form-label ">Trạng thái</label>
                        <div class="col-lg-3">
                            <select class="form-control" name="is_active">n>
                                <option value="1" > Đang hoạt động</option>
                                <option value="0"> Tạm ngưng </option>
                            </select>

                            <span class="m-form__help">Vui lòng chọn chọn trạng thái</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                           Mật khẩu
                        </label>
                        <div class="col-lg-3 {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <input type="password" name="password" class="form-control m-input" placeholder="Nhập mật khẩu">
                            @if ($errors->has('password'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('password') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">Vui lòng nhập mật khẩu</span>
                        </div>
                        <label class="col-lg-2 col-form-label">
                            Nhập lại mật khẩu
                        </label>
                        <div class="col-lg-3 {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                            <input type="password" name="password_confirmation" class="form-control m-input" placeholder="Nhập lại mật khẩu">
                            @if ($errors->has('password_confirmation'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('password_confirmation') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">Vui lòng nhập lại mật khẩu</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                           Số điện thoại
                        </label>
                        <div class="col-lg-3 {{ $errors->has('phone') ? ' has-danger' : '' }}">
                            {!! Form::text('phone', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập tên số điện thoại']) !!}
                            @if ($errors->has('phone'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('phone') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">Vui lòng số điện thoại</span>
                        </div>
                        <label class="col-lg-2 col-form-label">
                            Chức danh
                        </label>
                        <div class="col-lg-3 {{ $errors->has('staff_title_id') ? ' has-danger' : '' }}">
                            <select class="form-control" name="staff_title_id">
                                <option value=""> --- Vui lòng chọn chức danh ---</option>
                                @foreach($staffTitleOption as $key=>$item)
                                    <option value="{{$key}}">{{$item}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('staff_title_id'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('staff_title_id') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">Vui lòng chọn chức danh</span>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Hình ảnh
                        </label>
                        <div class="col-lg-8">
                            <div  class="dropzone" id="my-dropzone" name="myDropzone">
                                <div class="fallback">
                                    <input name="avatar" type="file" />
                                </div>
                            </div>
                        </div>
                        <div id="preview" style="display: none;">

                            <div class="dz-preview dz-file-preview">
                                <div class="dz-image"><img data-dz-thumbnail /></div>

                                <div class="dz-details">
                                    <div class="dz-size"><span data-dz-size></span></div>
                                    <div class="dz-filename"><span data-dz-name></span></div>
                                </div>
                                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                <div class="dz-error-message"><span data-dz-errormessage></span></div>



                                <div class="dz-success-mark">

                                    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                        <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                                        <title>Check</title>
                                        <desc>Created with Sketch.</desc>
                                        <defs></defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                            <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                                        </g>
                                    </svg>

                                </div>
                                <div class="dz-error-mark">

                                    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                        <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                                        <title>error</title>
                                        <desc>Created with Sketch.</desc>
                                        <defs></defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                            <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                                <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10">
                                <a onclick="submitForm()" type="submit" id="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</a>
                                <a href="{{route('staff')}}" class="btn-md btn btn-secondary"><i class="fa fa-btn fa fa-reply-all"></i> Hủy</a>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('after_script')

    <script type="text/javascript">

        function submitForm() {
            alert(1);
            $('#addStaff').validate({
                rules : {
                    fullname : {
                        required : true
                    },
                    code : {
                        required : true
                    }
                },
                messages : {
                    fullname : {
                        required : "Email không được để trống",
                    },
                    code : {
                        required : "Mật khẩu không được để trống",
                    }
                }
            });
        }

        Dropzone.options.myDropzone = {
            fileName: 'avatar',
            autoProcessQueue: false,
            url: laroute.route('staff.add'),

            init: function () {
                var myDropzone = this;
                // Update selector to match your button
                $("button#submit").on('click',function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();


                });
                this.on('error', function(file, errorMessage){
                    // if(file.status === 422) {
                    //     var errors = errorMessage.responseJSON;
                    //     $.each(errors, function (key, value) {
                    //         $('.'+key+'-error').html(value);
                    //     });
                    // }

                });
                this.on('sending', function(file, xhr, formData) {
                    // Append all form inputs to the formData Dropzone will POST
                    var data = $('#addStaff').serializeArray();
                    $.each(data, function(key, el) {
                        formData.append(el.name, el.value);
                    });
                });
            }
        };


        function validate() {

        }
    </script>


    <script src="{{asset('static/backend/js/admin/staff/list.js')}}" type="text/javascript"></script>
@stop
