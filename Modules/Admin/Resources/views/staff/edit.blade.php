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
                {!! Form::open(['method'=>'PUT','enctype'=>"multipart/form-data",'route' =>array('staff.edit',$OBJECT->staff_id),'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) !!}
                {{ method_field('PUT') }}
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Mã nhân viên
                        </label>
                        <div class="col-lg-3 {{ $errors->has('code') ? ' has-danger' : '' }}">
                            {!! Form::text('code',$OBJECT->code, ['class' => 'form-control m-input', 'placeholder' => 'Nhập mã nhân viên']) !!}
                            @if ($errors->has('code'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('code') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">Vui lòng nhập mã nhân viên</span>
                        </div>
                        <label class="col-lg-2 col-form-label ">Chi nhánh</label>
                        <div class="col-lg-3">
                            <select class="form-control" name="store_id">
                                <option value=""> --- Vui lòng chọn chi nhánh ---</option>
                                @foreach($storeOption as $key=>$item)
                                    <option {{($key==$OBJECT->store_id)? 'selected': ''}} value="{{$key}}">{{$item}}</option>
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
                            {!! Form::text('fullname', $OBJECT->fullname, ['class' => 'form-control m-input', 'placeholder' => 'Nhập tên nhân viên']) !!}
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
                                    <option {{($key==$OBJECT->staff_department_id)? 'selected': ''}} value="{{$key}}">{{$item}}</option>
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
                            {!! Form::text('username', $OBJECT->username, ['class' => 'form-control m-input', 'placeholder' => 'Nhập tên tài khoản']) !!}
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
                                <option value="1" {{($OBJECT->is_actice == 1) ? 'selected' : ''}} > Đang hoạt động</option>
                                <option value="0" {{($OBJECT->is_actice == 0) ? 'selected' : ''}} > Tạm ngưng </option>
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
                            {!! Form::text('phone', $OBJECT->phone, ['class' => 'form-control m-input', 'placeholder' => 'Nhập tên số điện thoại']) !!}
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
                                    <option {{($key==$OBJECT->staff_title_id)? 'selected': ''}} value="{{$key}}">{{$item}}</option>
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
                        <div class="col-lg-3 {{ $errors->has('avatar') ? ' has-danger' : '' }}">
                            <div class="input-group">

                                <span class="input-group-btn">
                                    <span class="btn btn-info btn-file">
                                        Browse… <input type="file" id="imgInp"  name="avatar">
                                    </span>
                                </span>
                                <input disabled="disabled" type="text" class="form-control" readonly value="Vui lòng chọn hình ảnh"/>

                                <div class="input-group ">
                                    <img  id='img-upload'  style="margin-top: 10px; max-width: 300px; max-height: 155px;">
                                </div>
                                @if(!empty($OBJECT->avatar))
                                    <a  href="{{asset($OBJECT->avatar)}}" target="_blank" ><img id="image_update" class="img-responsive img-thumbnail" src="{{asset($OBJECT->avatar)}}" alt="" style="max-width: 300px; max-height: 155px;"></a>
                                @endif
                                @if ($errors->has('avatar'))
                                    <span  class="form-control-feedback avatar">
                                    	{{ $errors->first('avatar') }}
                                    </span>
                                    <br>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
                <input type="hidden" name="staff_id" value="{{$OBJECT['staff_id']}}" />
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
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
    <script src="{{asset('static/backend/js/admin/staff/list.js')}}" type="text/javascript"></script>
@stop
