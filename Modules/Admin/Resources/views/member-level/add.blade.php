@extends('layout')

@section('page_subheader')
    @include('components.subheader', ['title' => 'Cấu hình'])
@stop

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Thêm danh sách cấp độ / hạng
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                {!! Form::open(['route' => 'member-level.submitadd', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) !!}
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Cấp độ / hạng:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('member_level_name') ? ' has-danger' : '' }}">
                            {!! Form::text('member_level_name', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập cấp độ / hạng']) !!}
                            @if ($errors->has('member_level_name'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('member_level_name') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Vui lòng nhập cấp độ / hạng
								</span>
                        </div>

                        <label class="col-lg-2 col-form-label">
                            Số điểm quy đổi
                        </label>
                        <div class="col-lg-3 {{ $errors->has('member_level_milestone') ? ' has-danger' : '' }}">
                            {!! Form::text('member_level_milestone', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập số điểm quy đổi']) !!}
                            @if ($errors->has('member_level_milestone'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('member_level_milestone') }}
                                    </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Nhập số điểm quy đổi
								</span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Trang thái:
                        </label>
                        <div class="col-lg-3">
                            <div class="m-radio-inline">
                                <label class="m-radio m-radio--solid">
                                    {!! Form::radio('is_active', 1, true) !!}
                                    Active
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--solid">
                                    {!! Form::radio('is_active', 0) !!}
                                    Deactive
                                    <span></span>
                                </label>
                            </div>
                            <span class="m-form__help">Please select user status</span>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>  Lưu</button>
                                <a href="{{ route('member-level') }}" class="btn btn-secondary"><i class="fa fa-btn fa fa-reply-all"></i> Hủy</a>
                                <input type="reset" value="Xóa" class="btn btn-danger pull-right">
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        <!--end::Form-->
        </div>
    </div>
@stop