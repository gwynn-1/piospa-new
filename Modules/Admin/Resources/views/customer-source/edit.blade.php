@extends('layout')

@section('page_subheader')
    @include('components.subheader', ['title' => 'Đơn vị sản phẩm'])
@stop

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">{{$TITLE}}</h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                {!! Form::model($item, ['method' => 'post','class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed','route' => ['customer-source.edit',$item->customer_source_id]]) !!}
                <div class="m-portlet__body">
                    @if (session('messages'))
                        <div class="alert alert-warning alert-dismissible">
                            <strong>Warning!</strong> {!! session('messages') !!}.
                        </div>
                    @endif
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label"> Tên nguồn khách hàng </label>
                            <div class="col-lg-3 {{ $errors->has('customer_source_name') ? ' has-danger' : '' }}" >
                                {!! Form::text('customer_source_name', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập tên đơn vi']) !!}
                                @if ($errors->has('customer_source_name'))
                                    <span class="form-control-feedback">
                                    	{{ $errors->first('customer_source_name') }}
                                    </span>
                                    <br>
                                @endif
                                <span class="m-form__help">Vui lòng nhập tên nguồn khác</span>
                            </div>
                            <label class="col-lg-2 col-form-label"> Mã nguồn khách hàng</label>
                            <div class="col-lg-3 {{ $errors->has('customer_source_code') ? ' has-danger' : '' }}" >
                                {!! Form::text('customer_source_code', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập tên đơn vi']) !!}
                                @if ($errors->has('customer_source_code'))
                                    <span class="form-control-feedback">
                                    	{{ $errors->first('customer_source_code') }}
                                    </span>
                                    <br>
                                @endif
                                <span class="m-form__help">Vui lòng nhập mã nguồn khách hàng</span>
                            </div>

                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label"> Mô tả</label>
                            <div class="col-lg-3 " >
                                {!! Form::textarea('customer_source_description', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập tên đơn vi']) !!}

                                <span class="m-form__help">Mô tả</span>
                            </div>
                            <label class="col-lg-2 col-form-label">
                                Trạng thái:
                            </label>
                            <div class="col-lg-3">
                                <select name="is_active" class="form-control">
                                    <option value="1" {!!($item->is_active ==1) ? 'selected' :'' !!}>Đang hoạt đông</option>
                                    <option value="0" {!!($item->is_active ==0) ? 'selected' :'' !!}>Tạm ngưng</option>
                                </select>
                                <span class="m-form__help">Trạng thái hoạt động</span>
                            </div>
                        </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
                                <a href="{{ route('customer-source') }}" class="btn btn-secondary"> <i class="fa fa-btn fa fa-reply-all"></i>Hủy</a>
                                <input type="reset" value="Xóa" class="btn btn-danger pull-right">
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
            <!--end::Form-->
            </div>
        </div>
    </div>
@stop
@section('after_script')
    <script src="{{asset('static/backend/js/admin/customer-source/list.js')}}" type="text/javascript"></script>
@stop
