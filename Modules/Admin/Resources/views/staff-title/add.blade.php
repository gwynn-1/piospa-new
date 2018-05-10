@extends('layout')
@section('page_subheader')
    @include('components.subheader', ['title' => 'Chức danh'])
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Thêm chức danh
                            </h3>
                        </div>
                    </div>
                </div>
                {!! Form::open(['route'=>'admin.staff-title.submitadd', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']) !!}
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Tên chức danh :
                        </label>

                        <div class="col-lg-3">
                            {!! Form::text('staff_title_name',null,['class' => 'form-control m-input','placeholder' => 'Nhập tên chức danh']) !!}
                            <br>
                            @if ($errors->has('staff_title_name'))
                                <span class="form-control-feedback">
                                     {{ $errors->first('staff_title_name') }}
                                </span>
                                <br>
                            @endif
                            <span class="m-form__help">
									Tên chức danh
                            </span>
                        </div>



                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">
                            Trạng thái :
                        </label>
                        <div class="col-lg-3">
                            <select name="is_active" class="form-control">
                                <option value="1">Hoạt động</option>
                                <option value="0">Tạm ngừng</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-success">Lưu lại</button>
                                <a href="{{ route('admin.staff-title') }}" class="btn btn-secondary">Hủy</a>
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