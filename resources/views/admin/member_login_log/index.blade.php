@extends('admin.layouts.main')
@section('content')
    <style type="text/css">
        .btn-group>.btn:first-child{
            width: 84px;
        }
    </style>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{__('words.member_login_record')}}</h3>
            </div>
            <div class="panel-body">
                @include('admin.member_login_log.filter')

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 10%">ID</th>
                        <th style="width: 15%">{{__('words.account_number')}}</th>
                        <th  >IP</th>
                        <th  style="width: 15%">{{__('words.log_in_time')}}</th>
                        {{--<th  style="width: 20%">操作</th>--}}
                    </tr>
                    
                    @foreach($data as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-primary">
                                         {{ $item->member->name or '已删除'}}
                                    </button>
                                    @isset($item->member)
                                        <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#" class="show-cate" data-uri="{{ route('member.checkBalance', ['id' => $item->member->id]) }}">{{__('words.view')}}</a></li>
                                            <li><a href="{{ route('member.edit', ['id' => $item->member->id]) }}">{{__('words.modify')}}</a></li>
                                            <li><a href="{{ route('member.assign', ['id' => $item->member->id]) }}">{{__('words.distribution_agent')}}</a></li>

                                            @if ($item->member->status == 0)
                                                <li><a href="{{ route('member.check', ['id' => $item->member->id, 'status' => 1]) }}" onclick="return confirm('确定禁用吗？')"><span style="color:red">{{__('words.disable')}}</span></a></li>
                                            @elseif($item->member->status == 1)
                                                <li><a href="{{ route('member.check', ['id' => $item->member->id, 'status' => 0]) }}" onclick="return confirm('确定启用吗？')"><span style="color:green">{{__('words.enable')}}</span></a></li>
                                            @endif                                        
                                        </ul>  
                                    @endisset
                                </div>
                            </td>
                            <td>
                                {{ $item->ip }}
                            </td>
                            <td>
                                {{ $item->created_at }}
                            </td>

                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-info btn-xs">查看</button>--}}
                            {{--</td>--}}
                        </tr>
                    @endforeach
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>{{__('words.total')}} <strong style="color: red">{{ $data->total() }}</strong> {{__('words.article')}}</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        {!! $data->appends(['name' => $name, 'start_at' => $start_at, 'end_at' => $end_at, 'ip' => $ip])->links() !!}
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->

    <script>
         $(function(){
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '记录',
                     shadeClose: false,
                     shade: 0.8,
                     area: ['90%', '90%'],
                     content: url
                 });
             })
         });
     </script>
@endsection