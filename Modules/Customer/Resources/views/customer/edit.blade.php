@extends('layout')

@section('page_subheader')
    @include('components.subheader', ['title' => 'Khách '])
@stop

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Cập nhật khách hàng
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                {{ Form::model($item, array('method' => 'post','enctype'=>"multipart/form-data",'route' => array('customer.edit',$item->customer_id) ,'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed')) }}
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Mã khách hàng :
                        </label>
                        <div class="col-lg-3 {{ $errors->has('code') ? ' has-danger' : '' }}">
                            {!! Form::text('code', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập mã khách hàng']) !!}
                            @if ($errors->has('code'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('code') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Mã khách hàng tự phát sinh hoặc tự nhập
								</span>
                        </div>
                        <label class="col-lg-2 col-form-label">
                            Tên khách hàng
                        </label>
                        <div class="col-lg-3 {{ $errors->has('fullname') ? ' has-danger' : '' }}">
                            {!! Form::text('fullname', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập tên khách hàng']) !!}
                            @if ($errors->has('fullname'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('fullname') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Vui lòng nhập tên khách hàng
								</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Giới tính :
                        </label>
                        <div class="col-lg-3">
                            <label class="radio-inline"><input type="radio" name="optradio">Nam</label>
                            <label class="radio-inline"><input type="radio" name="optradio">Nữ</label>
                            <label class="radio-inline"><input type="radio" name="optradio">Khác</label>
                        </div>
                        <label class="col-lg-2 col-form-label">
                            Ngày sinh:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('birthday') ? ' has-danger' : '' }}">
                            {!! Form::date('birthday', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập tên ngày sinh']) !!}
                            @if ($errors->has('birthday'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('birthday') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Vui lòng nhập ngày sinh
								</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Người giới thiệu:
                        </label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="search_keyword" placeholder="Nhập nội dung tìm kiếm">
                        </div>
                        <label class="col-lg-2 col-form-label">
                            Số điện thoại:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('phone') ? ' has-danger' : '' }}">
                            {!! Form::text('phone', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập số điện thoại']) !!}
                            @if ($errors->has('phone'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('phone') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Vui  lòng nhập số điện thoại
								</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-1 col-form-label">
                            Nguồn:
                        </label>
                        <div class="col-lg-2 {{ $errors->has('customer_source_id') ? ' has-danger' : '' }}">
                            <select name="customer_source_id" class="form-control">
                                <option value="">Chọn nguồn</option>
                                @foreach($optionCustomerSource as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-lg-2 col-form-label">Trạng thái</label>
                        <div class="col-lg-2">
                            <select class="form-control" name="is_active">
                                <option value="1" >Đang hoạt đông</option>
                                <option value="0" >Tạm ngưng</option>
                            </select>
                            <span class="m-form__help">Vui lòng chọn trạng thái</span>
                        </div>
                        <label class="col-lg-2 col-form-label">
                            CMND :
                        </label>
                        <div class="col-lg-3 {{ $errors->has('cmnd') ? ' has-danger' : '' }}">
                            {!! Form::text('cmnd', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập CMND']) !!}
                            @if ($errors->has('cmnd'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('cmnd') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Vui  lòng nhập CMND
								</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Province:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('province_id') ? ' has-danger' : '' }}">
                            <select name="province_id" id="province" class="form-control s-province">
                                <option value="">Tỉnh/ Thành</option>

                                @foreach($optionProvince as $key=>$City)
                                    @if($item->province_id == $key)
                                        <option value="{{$key}}" selected>{{$City}}</option>
                                    @else
                                        <option value="{{$key}}">{{$City}}</option>
                                    @endif
                                @endforeach

                            </select>
                            @if ($errors->has('province_id'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('province_id') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Vui lòng chọn Tỉnh/thành
								</span>
                        </div>
                        <label class="col-lg-2 col-form-label">
                            Zalo:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('zalo') ? ' has-danger' : '' }}">
                            {!! Form::text('zalo', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập số điện thoại sử dụng Zalo']) !!}
                            @if ($errors->has('zalo'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('zalo') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Vui  lòng nhập số điện thoại sự dụng zalo
								</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            District:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('district_id') ? ' has-danger' : '' }}">
                            <select name="district_id" id="district" class="form-control s-province">
                                <option value="">Quận/ Huyện</option>
                                @foreach($optionDistrict as $key=>$district)
                                    @if($item->district_id == $key)
                                        <option value="{{$key}}" selected>{{$district}}</option>
                                    @else
                                        <option value="{{$key}}">{{$district}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br>
                            @if ($errors->has('district_id'))
                                <span class="form-control-feedback">
                                             {{ $errors->first('district_id') }}
                                </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Vui lòng chọn quận/huyện
								</span>
                        </div>
                        <label class="col-lg-2 col-form-label">
                            Email:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('email') ? ' has-danger' : '' }}">
                            {!! Form::text('email', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập email']) !!}
                            @if ($errors->has('email'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('email') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Vui lòng nhập email
								</span>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Ward:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('ward_id') ? ' has-danger' : '' }}">
                            <select name="ward_id" id="ward" class="form-control s-province">
                                <option value="">Phường/ Xã</option>
                                @foreach($optionWard as $key=>$ward)
                                    @if($item->ward_id == $key)
                                        <option value="{{$key}}" selected>{{$ward}}</option>
                                    @else
                                        <option value="{{$key}}">{{$ward}}</option>
                                    @endif
                                @endforeach

                            </select>
                            @if ($errors->has('ward_id'))
                                <span class="form-control-feedback">
                                             {{ $errors->first('ward_id') }}
                                        </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Vui lòng chọn phường/xã
								</span>
                        </div>

                        <label class="col-lg-2 col-form-label">
                            Facebook:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('facebook') ? ' has-danger' : '' }}">
                            {!! Form::text('facebook', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập Facebook']) !!}
                            @if ($errors->has('facebook'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('facebook') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">
                        Vui lòng nhập facebook
                    </span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Địa chỉ:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('address') ? ' has-danger' : '' }}">
                            {!! Form::text('address', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập địa chỉ']) !!}
                            @if ($errors->has('address'))
                                <span class="form-control-feedback">
                            {{ $errors->first('address') }}
                        </span>
                                <br>
                            @endif
                            <span class="m-form__help">
                        Vui lòng nhập địa chỉ
                    </span>
                        </div>
                        <label class="col-lg-2 col-form-label">
                            Hình ảnh :
                        </label>

                        <div class="col-lg-3">
                            <div class="m-dropzone dropzone dz-clickable" action="{{route('customer.uploads')}}" id="dropzoneone">
                                <div class="m-dropzone__msg dz-message needsclick">
                                    <h3 class="m-dropzone__msg-title">Drop files here or click to upload.</h3>
                                    <span class="m-dropzone__msg-desc">This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('customer') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!--end::Form-->
                </div>
            </div>
        </div>
    </div>

@stop
@section('after_script')
    <script src="{{asset('static/backend/js/admin/store/change.js')}}" type="text/javascript"></script>
@stop
