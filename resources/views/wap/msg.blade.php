@extends('wap.layouts.main')
@section('content')
    @include('wap.layouts.header')
    <div class="m_container">
        <div class="m_body">
            <div class="container-fluid gm_main">
                {{--<div class="head">--}}
                {{--<a class="f_l" href="#u_nav"><img src="{{ asset('/wap/images/user_menu.png') }}" alt=""></a>--}}
                {{--<span>会员中心</span>--}}
                {{--<a class="f_r" href="#type"><img src="{{ asset('/wap/images/user_game.png') }}" alt=""></a>--}}
                {{--</div>--}}
                {{--@include('wap.layouts.aside')--}}
                {{--<div id="type" style="display: none">--}}
                {{--<ul class="g_type">--}}
                {{--<li>--}}
                {{--@include('wap.layouts.aside_game_list')--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                <div class="m_member-title clear textCenter">
                    <a class="pull-left" href="javascript:history.go(-1);">&nbsp;{{ __('mb.Back') }}</a>
                    {{ __('mb.My_News') }}
                </div>
                <div class="m_userCenter-line"></div>
                <div class="wrap userInfo">
                    <table cellspacing="1" cellpadding="0" border="0" class="tab1 mt10 text-center">
                        <tr class="tic">
                            <td width="20%">{{ __('mb.Time') }}</td>
                            <td width="20%">{{ __('mb.Title') }}</td>
                            <td width="60%">{{ __('mb.Content') }}</td>
                        </tr>
                        @if ($data->total() > 0)
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->content }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">{{ __('mb.No_Record_Found') }}</td>
                            </tr>
                        @endif
                    </table>
                    <table border="0" cellspacing="0" cellpadding="0" class="page">
                        <tr>
                            {!! $data->links() !!}
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection