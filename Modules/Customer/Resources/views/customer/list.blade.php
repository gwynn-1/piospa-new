<style>
    /* Dropdown Button */
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 9;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: #ff7652;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ddd;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }
    .dropdown:hover .dropbtn{
        background-color: #3e8e41;
    }

</style>

<div class="table-responsive">
    <table class="table table-striped m-table m-table--head-bg-primary">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã khách hàng</th>
            <th>Tên khách hàng </th>
            <th>Giới tính </th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Tỉnh / thành</th>
            <th>Quận / huyện</th>
            <th>Phường / Xã</th>
            <th>Trạng thái</th>
            <th>Hoạt động</th>

        </tr>
        </thead>
        <tbody>
        @if (isset($LIST))

            @foreach ($LIST as $key=>$item)
                <tr>
                    <td>{{ ($key+1) }}</td>     {{--$key la dem so phan tu cua mang dem tu 0 tro di, nhung o day ta +1 nen no se chay tu 1 2 3 4 5 6--}}
                    <td>{{ $item['code'] }}</td>  {{--va xuat ra 1 day so thu tu tang dan theo so phan tu cua mang--}}
                    <td>{{ $item['fullname'] }}</td>
                    <td>{{ $item['gender'] }}</td>
                    <td>{{ $item['phone'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['province_name'] }}</td>
                    <td>{{ $item['district_name'] }}</td>
                    <td>{{ $item['ward_name'] }}</td>
                    <td>
                        @if ($item['is_active'])
                            <span class="m-badge  m-badge--success m-badge--wide">Đang hoạt động</span>
                        @else
                            <span class="m-badge  m-badge--danger m-badge--wide">Tạm ngưng</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill dropbtn"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                            <div class="dropdown-content">
                                @if ($item['is_active'])
                                    <a class="disabled" style="color: #ff4033" href='javascript:void (0)' onclick="Customer.changeStatus(this, '{!! $item['customer_id'] !!}', 'publish')"><i class="fa fa-circle-o"></i> Tạm ngưng </a>
                                @else
                                    <a style="color: #1ab315" href='javascript:void (0)' onclick="Customer.changeStatus(this, '{!! $item['customer_id'] !!}', 'unPublish')"><i class="fa fa-circle-o"></i> Kính hoạt</a>
                                @endif
                            </div>
                        </div>
                        <a href="{{route('customer.edit', array('customer_id'=>$item['customer_id']))}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Update"><i class="la la-edit"></i></a>
                        <button  onclick="Customer.remove(this, '{{ $item['customer_id'] }}')"  class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete"><i class="la la-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
{{ $LIST->links('helpers.paging') }}
