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
                                Sửa tài khoản
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                {!! Form::model($item,['method' => 'POST','route' => ['staff-account.submitedit', $item->staff_account_id],
                'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) !!}
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Nhân viên:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('staff_id') ? ' has-danger' : '' }}">
                            {!! Form::text('staff_id', null, ['class' => 'form-control m-input', 'placeholder' => 'Nhập mã hoac tên nhân viên']) !!}
                            @if ($errors->has('staff_id'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('staff_id') }}
                                    </span>
                            @endif
                            <span class="m-form__help">
									Nhập mã hoac tên nhân viên
								</span>
                        </div>

                        <label class="col-lg-2 col-form-label">
                            Chi nhánh:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('store_id') ? ' has-danger' : '' }}">
                            <select name="store_id" id="Year" >
                                @foreach($optionStaffAccount as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('store_id'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('store_id') }}
                                </span>
                                <br>
                            @endif

                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Tài khoản:
                        </label>
                        <div class="col-lg-3 {{ $errors->has('username') ? ' has-danger' : '' }}">
                            {!! Form::text('username', null, ['class' => 'form-control m-input', 'placeholder' => 'Vui lòng nhập tài khoản']) !!}
                            @if ($errors->has('username'))
                                <span class="form-control-feedback">
                                    	{{ $errors->first('username') }}
                                </span>
                            @endif
                            <span class="m-form__help">
									Vui lòng nhập tài khoản
                            </span>
                        </div>




                    </div>


                </div>




                <div class="form-group m-form__group row">
                    <label class="col-lg-2 col-form-label">
                        Trạng thái:
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
                        <span class="m-form__help">
									Please select user status
								</span>
                    </div>



                </div>
            </div>

            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-success">Lưu lại</button>
                            <a href="{{ route('staff-account') }}" class="btn btn-secondary">Hủy</a>
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