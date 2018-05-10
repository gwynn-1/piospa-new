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
                {!! Form::open(['method' => 'post','enctype'=>"multipart/form-data",'route' => 'customer-group.add', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) !!}
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Tên nhóm
                        </label>
                        <div class="col-lg-3 {{ $errors->has('customer_group_name') ? ' has-danger' : '' }}">
                            {!! Form::text('customer_group_name', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập tên nhóm khách hàng']) !!}
                            @if ($errors->has('customer_group_name'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('customer_group_name') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">Vui lòng nhập tên nhóm khách hàng</span>
                        </div>
                        <label class="col-lg-2 col-form-label ">Mã nhóm</label>
                        <div class="col-lg-3 {{ $errors->has('customer_group_code') ? ' has-danger' : '' }}">
                            {!! Form::text('customer_group_code', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập mã nhóm']) !!}
                            @if ($errors->has('customer_group_code'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('customer_group_code') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">Vui lòng nhập mã nhóm</span>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">Trạng thái</label>
                        <div class="col-lg-3">
                            <select class="form-control" name="is_active">
                                <option value="1" >Đang hoạt đông</option>
                                <option value="0" >Tạm ngưng</option>
                            </select>
                            <span class="m-form__help">Vui lòng chon trạng thái</span>
                        </div>
                        <label class="col-lg-2 col-form-label">
                            Hình ảnh
                        </label>
                        <div class="col-lg-3 {{ $errors->has('customer_group_image') ? ' has-danger' : '' }}">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-info btn-file">
                                        Browse… <input type="file" id="imgInp"  name="customer_group_image">
                                    </span>
                                </span>
                                <input disabled="disabled" type="text" class="form-control" readonly value="Vui lòng chọn hình ảnh"/>

                                <div class="input-group ">
                                    <img  id='img-upload'  style="margin-top: 10px; max-width: 300px; max-height: 155px;">
                                </div>

                                @if ($errors->has('customer_group_image'))
                                    <span  class="form-control-feedback customer_group_image">
                                    	{{ $errors->first('customer_group_image') }}
                                    </span>
                                    <br>
                                @endif

                            </div>
                        </div>


                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                           Mô tả
                        </label>
                        <div class="col-lg-8 {{ $errors->has('customer_group_image') ? ' has-danger' : '' }}">
                            {!! Form::textarea('customer_group_description', null, ['style'=>'max-height : 100px;','class' => 'form-control m-input','placeholder' => 'Nhập mô tả']) !!}

                            <span class="m-form__help">Vui lòng nhập mô tả</span>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
                                <a href="{{ route('customer-group') }}" class="btn-md btn btn-secondary"><i class="fa fa-btn fa fa-reply-all"></i> Hủy</a>
                                <input type="reset" value="Xóa" class="btn btn-danger pull-right">
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
    <script src="{{asset('static/backend/js/admin/customer-group/list.js')}}" type="text/javascript"></script>
@stop